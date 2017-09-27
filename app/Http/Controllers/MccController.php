<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mcc;
use Yajra\Datatables\Facades\Datatables;

class MccController extends Controller
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
      //$this->toDatatable($request->id);

      return view('mccs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, $this->rules());
      $mcc = new Mcc;
      $mcc->cost = $request->cost;
      $mcc->currency = $request->currency;
      $mcc->save();
      //dd($id);
       $msg = [
           'title' => 'Created!',
           'type' => 'success',
           'text' => 'Mcc created successfully.'
       ];

       return redirect('/mcc')->with('message', $msg);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mcc $mcc)
    {
      if ($mcc) {
          $status = $mcc->status ? 0 : 1;

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

          $mcc->status = $status;
          $mcc->save();

          return response()->json($msg);
      }
      return abort(404);

    }


    private function rules()
    {
        return [
            'cost' => 'required|numeric|digits_between:1,6',
            'currency'    => 'required',
        ];
    }

    public function toDatatable()
    {
        $mcc = Mcc::where('status', 1)->get();
        return Datatables::of($mcc)
            ->addColumn('actions', function ($mcc) {
                return view('mccs.partials.buttons', ['mcc' => $mcc]);
            })
            ->editColumn('status', function ($mcc) {
                if($mcc->status)
                    return 'Activo';
                else
                    return 'Inactivo';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
