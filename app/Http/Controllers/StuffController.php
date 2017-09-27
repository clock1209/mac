<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use App\Stuff;
use App\Concepts;


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
          return $this->getdata();
      }

        return view('stuffs/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $concepts = [null => 'Select'];
        $concepts = array_merge($concepts, Concepts::pluck('name', 'name')->toArray());
        return view('stuffs/create', ['concepts' => $concepts]);
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

         Stuff::create($request->all());

         $msg = [
             'title' => 'Created!',
             'type' => 'success',
             'text' => 'Stuff created successfully.'
         ];

         return redirect('stuffs')->with('message', $msg);
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */




     public function getdata()
    {

       $concepts = Stuff::where('status', 1)->get();

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

    public function edit(Stuff $stuff)
    {
        $concepts = [null => 'Select'];
        $concepts = array_merge($concepts, Concepts::pluck('name', 'name')->toArray());
        return view('stuffs.edit', ['stuff' => $stuff], compact('concepts'));
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

        return redirect('stuffs')->with('message', $msg);
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
}
