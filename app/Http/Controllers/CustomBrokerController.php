<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomBroker;
use App\Broker;
use Illuminate\Support\Facades\App;
use Yajra\Datatables\Facades\Datatables;

class CustomBrokerController extends Controller
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
//        $this->validate($request, $this->rules());

        Broker::create($request->all());

        $msg = [
            'title' => 'Created!',
            'type' => 'success',
            'text' => 'Custom Broker created successfully.'
        ];

        return response()->json($msg);
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
    public function BrokerStatus(Broker $broker)
    {
        $broker->status = ($broker->status == 1) ? 0 : 1;
        $broker->save();

        $msg = [
            'title' => 'Deleted!',
            'type' => 'success',
            'text' => 'Customer Broker deleted successfully.'
        ];

        return response()->json($msg);
    }
    public function toDatatable() {
        $customBrokers = Broker::where('status', 1);
        return Datatables::eloquent($customBrokers)
            ->addColumn('actions', function ($customBroker) {
                return view('customBroker.partials.buttons', ['customBroker' => $customBroker]);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
