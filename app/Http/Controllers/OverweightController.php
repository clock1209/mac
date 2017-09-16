<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Remark;
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

      return redirect('/remarks')->with('message', $msg);
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
    public function edit(Overweight $overweight)
    {
        return view('remarks.index',['overweight' => $overweight]);
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

      return redirect('remarks')->with('message',$msg);

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
        $overweight = Overweight::all();
        return Datatables::of($overweight)
            ->addColumn('actions', function ($overweight) {
                return view('overweight.partials.buttons', ['overweight' => $overweight]);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
