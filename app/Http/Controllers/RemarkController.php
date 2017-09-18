<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Remark;
use App\Concepts;
use App\PortName;

class RemarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $concepts = Concepts::pluck('name', 'id')->toArray();
        $ports = PortName::pluck('name','id')->toArray();
        return view('remarks.index',['overweight' => 0,'concepts' => $concepts,'subject' => 0,'inlands' => 0,'port'=>$ports]);
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

      $remark = new Remark($request->all());

      if($request->nameconditions=="Free demurrage at destinations")
      {
        $remark->valuecondition=$request->valueconditionsone;
      }
      else if($request->nameconditions=="Price per day")
      {
        $remark->valuecondition=$request->valueconditionstwo;
      }
      $remark->save();
      $msg = [
          'title' => 'Created!',
          'type' => 'success',
          'text' => 'Remark created successfully.'
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
    public function destroy($id)
    {
        //
    }
}
