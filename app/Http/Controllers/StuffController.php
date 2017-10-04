<?php

namespace App\Http\Controllers;

use App\Consolidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use App\Stuff;


class StuffController extends Controller
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
          return $this->getdata($request->id);
      }

        return view('stuffs/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('stuffs.create', ['consolidator'=>$request->consolidator]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
         $request->flash();
         $this->validate($request, $this->rules());

         Stuff::create($request->all());

         $msg = [
             'title' => 'Created!',
             'type' => 'success',
             'text' => 'Stuff created successfully.'
         ];

         return redirect()->route('stuffs.consolidator', $request->consolidator_id)->with('message', $msg);
     }

     private function rules()
     {
         return [
             'concepts' => 'required',
             'cost' => 'required|numeric',
             'type' => 'required',
             'agreed_cost' => 'required|not_in:0',
             'currency' => 'required|not_in:0'
         ];
     }

     public function getdata($id)
    {

       $concepts = Stuff::where('status', 1)
           ->where('consolidator_id', $id)
           ->get();

       return Datatables::of($concepts)
        ->addColumn('actions', function ($concept)
        {
            return view('stuffs.partials.buttons', ['stuffs' => $concept]);
        })
        ->editColumn('type', function($concept) {
            return strtoupper($concept->type);
        })
        ->editColumn('agreed_cost', function($concept) {
            return strtoupper($concept->agreed_cost);
        })
        ->rawColumns(['actions'])
        ->make(true);
    }



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

    public function edit(Stuff $stuff, Request $request)
    {
        return view('stuffs.edit', ['stuff' => $stuff, 'consolidator'=>$request->consolidator]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Stuff $stuff)
    {
        $request->flash();
        $this->validate($request, $this->rules());

        $stuff->fill($request->all());
        $stuff->save();

        $msg = [
            'title' => 'Edited!',
            'type' => 'success',
            'text' => 'Stuff edited successfully.'
        ];

        return redirect()->route('stuffs.consolidator', $request->consolidator_id)->with('message', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(Stuff $stuff)
     {

         if ($stuff) {
             $status = $stuff->status ? 0 : 1;

             if($status) {
                 $msg = [
                     'title' => 'Activated!',
                     'type' => 'success',
                     'text' => 'Stuff activaded successfully.'
                 ];
             } else {
                 $msg = [
                     'title' => 'Deleted!',
                     'type' => 'success',
                     'text' => 'Stuff deleted successfully.'
                 ];
             }

             $stuff->status = $status;
             $stuff->save();

             return response()->json($msg);
         }
         return abort(404);
     }

     public function stuffsRelated(Consolidator $consolidator)
     {
         return view('stuffs.index', ['con_id'=>$consolidator->id]);
     }
}
