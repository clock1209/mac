<?php

namespace App\Http\Controllers;

use App\Port;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;

class PortController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->toDatatable($request->shipper);
        }
        return view('ports.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('ports.create',['shipper' => $request->id]);
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

        Port::create($request->all());

        $msg = [
            'title' => 'Created!',
            'type' => 'success',
            'text' => 'Port created successfully.'
        ];

        return redirect("shippers/$request->shipper_id")->with('message', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Port  $port
     * @return \Illuminate\Http\Response
     */
    public function show(Port $port)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Port  $port
     * @return \Illuminate\Http\Response
     */
    public function edit(Port $port)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Port  $port
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Port $port)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Port  $port
     * @return \Illuminate\Http\Response
     */
    public function destroy(Port $port)
    {
        if ($port) {
            $status = $port->status ? 0 : 1;

            if($status) {
                $msg = [
                    'title' => 'Activated!',
                    'type' => 'success',
                    'text' => 'Port activaded successfully.'
                ];
            } else {
                $msg = [
                    'title' => 'Deleted!',
                    'type' => 'success',
                    'text' => 'Port deleted successfully.'
                ];
            }

            $port->status = $status;
            $port->save();

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
    public function toDatatable($shipper = null)
    {
        $ports = Port::where('shipper_id',$shipper)->get();
        return Datatables::of($ports)
            ->addColumn('actions', function ($port) {
                return view('ports.partials.buttons', ['port' => $port]);
            })
            ->editColumn('shipper_id', function ($port) {
                return $port->shipper->tradename;
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
            'place_of_load' => 'required',
            'shipper_id' => 'required',
        ];
    }
}
