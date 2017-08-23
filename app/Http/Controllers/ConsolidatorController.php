<?php

namespace App\Http\Controllers;

use App\Consolidator;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;

class ConsolidatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!auth()->user())
            return abort(404);

        if ($request->ajax()) {
            return $this->toDatatable();
        }

        return view('consolidators.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user())
            return abort(404);

        return view('consolidators.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!auth()->user())
            return abort(404);

            $request->flash();
            $this->validate($request, $this->rules());

            Consolidator::create($request->all());

            $msg = [
                'title' => 'Created!',
                'type' => 'success',
                'text' => 'Consolidator created successfully.'
            ];

            return redirect("consolidators/create")->with('message', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Consolidator  $consolidator
     * @return \Illuminate\Http\Response
     */
    public function show(Consolidator $consolidator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consolidator  $consolidator
     * @return \Illuminate\Http\Response
     */
    public function edit(Consolidator $consolidator)
    {
        return view('consolidators.edit', ['consolidator' => $consolidator]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consolidator  $consolidator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consolidator $consolidator)
    {
        $request->flash();
        $this->validate($request, $this->rules());

        $consolidator->fill($request->all());
        $consolidator->save();

        $msg = [
            'title' => 'Edited!',
            'type' => 'success',
            'text' => 'Consolidator edited successfully.'
        ];

        return redirect('consolidators')->with('message', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consolidator  $consolidator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consolidator $consolidator)
    {
        if ($consolidator) {
            $status = $consolidator->status ? 0 : 1;

            if($status) {
                $msg = [
                    'title' => 'Activated!',
                    'type' => 'success',
                    'text' => 'Consolidator activaded successfully.'
                ];
            } else {
                $msg = [
                    'title' => 'Deleted!',
                    'type' => 'success',
                    'text' => 'Consolidator deleted successfully.'
                ];
            }

            $consolidator->status = $status;
            $consolidator->save();

            return response()->json($msg);
        }
        return abort(404);
    }

    /**
     * Make Datatable for index view.
     *
     * @param  \App\Port  $port
     * @return \Illuminate\Http\Response
     */
    public function toDatatable()
    {
        $consolidators = Consolidator::get();
        return Datatables::of($consolidators)
            ->addColumn('actions', function ($consolidator) {
                return view('consolidators.partials.buttons', ['consolidator' => $consolidator]);
            })
            ->editColumn('status', function ($consolidator) {
                if($consolidator->status)
                    return 'Activo';
                else
                    return 'Inactivo';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Port  $port
     * @return \Illuminate\Http\Response
     */
    private function rules()
    {
        return [
            'abbreviation' => 'required',
            'name' => 'required',
        ];
    }
}
