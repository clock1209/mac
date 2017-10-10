<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use App\Broker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Database\Query\Builder;
use Validator;

class BrokerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            return $this->toDatatable($request->customer_id);
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
        $this->validate($request, $this->rules1());

        if($request['customer_id']==0){
            $broker = new Broker($request->all());
            $broker['name']= $request->nameBroker;
            $broker['email']= $request->emailBroker;
            $broker['phone']= $request->phoneBroker;
            $broker['countrycode']= $request->countrycodebroker;
            $broker['contact']= $request->contact;
            $broker['customer_id']= null;
            $broker->save();
        }
        if($request['customer_id']!=0){
            $broker = new Broker($request->all());
            $broker['name']= $request->nameBroker;
            $broker['email']= $request->emailBroker;
            $broker['phone']= $request->phoneBroker;
            $broker['countrycode']= $request->countrycodebroker;
            $broker['customer_id']= $request['customer_id'];
            $broker->customer_id =$request['customer_id'];
            $broker['contact']= $request->contact;
            $broker->save();
        }
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
    public function edit(Broker $broker)
    {
        return response()->json($broker);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Broker $broker)
    {
        $this->validate($request, $this->rules1());

        $broker->fill($request->all());
        $broker->save();

        $msg = [
            'title' => 'Edited!',
            'type' => 'success',
            'text' => 'Custom Broker edited successfully.'
        ];

        return response()->json($msg);
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
    public function toDatatable($id) {
        if ($id==0){
            $customBrokers = Broker::where('customer_id', null)
                ->where('status',1);
        }
        if($id!=0){
            $customBrokers = Customer::find($id)
                ->customBrokers()
                ->where('status',1);
        }
        return Datatables::of($customBrokers)
            ->editColumn('phone', function ($customBrokers) {
                return $customBrokers->countrycode.' '.$customBrokers->phone;
            })
            ->addColumn('actions', function ($customBroker) {
                return view('customBroker.partials.buttons', ['customBroker' => $customBroker]);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    private function rules1()
    {
        return [
            'nameBroker' => 'required',
            'patent' => 'required',
            'emailBroker' => 'required|email',
            'phoneBroker' => 'required|numeric|digits:10',

        ];
    }
}
