<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Remark;
use App\PortName;
use App\Overweight;
use Yajra\Datatables\Facades\Datatables;

class OverweightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if($request->ajax()){
          return $this->toDatatable();
      }
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
      Overweight::create($request->all());

      $msg = [
          'title' => 'Created!',
          'type' => 'success',
          'text' => 'Overweight created successfully.'
      ];

      return redirect('/remarks')->with(['message'=> $msg,'overweight' => 1]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Overweight $overweight)
    {

        $overweight->status = ($overweight->status == 1) ? 0 : 1;
        $overweight->save();

        $msg = [
            'title' => 'Deleted!',
            'type' => 'success',
            'text' => 'Overweight deleted successfully.'
        ];

        return response()->json($msg);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Overweight $overweight)
    {
        $ports = PortName::pluck('name','id')->toArray();
        return view('remarks.index',['tab' => 1,'overweight' => $overweight,'concepts' => 0,'inlands' => 0,'subject' => 0,'port' => $ports]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Overweight $overweight)
    {

      $this->validate($request, $this->rules());

      $overweight->fill($request->all());
      $overweight->save();

      $msg = [
          'title' => 'Edited!',
          'type' => 'success',
          'text' => 'Overweight edited successfully.'
      ];


      return redirect('/remarks')->with(['tab' => 1,'message'=> $msg,'overweight' => $overweight,'concepts'=>0,'subject'=>0,'inlands'=>0]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function rules()
    {
        return [
            'rangeup' => 'required|numeric',
            'rangeto' => 'required|numeric',
            'cost' => 'required|numeric',
        ];
    }

    public function toDatatable() {
        $overweight = Overweight::where('status', 1)->get();
        return Datatables::of($overweight)
            ->addColumn('actions', function ($overweight) {
                return view('overweight.partials.buttons', ['overweight' => $overweight]);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
