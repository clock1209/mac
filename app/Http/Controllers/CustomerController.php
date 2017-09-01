<?php

namespace App\Http\Controllers;

use App\Broker;
use App\Providers\BroadcastServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Facades\Datatables;
use App\Customer;
use App\Country;
use App\CustomBroker;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->toDatatable();
        }
        return view('customers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = [null => 'Select country'];
        $countries = array_merge($countries, Country::pluck('name', 'name')->toArray());
        return view('customers.create', ['countries' => $countries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Customer::create($request->all());
        $customer = Customer::all()->last();
        $brokers = Broker::all();
        foreach ($brokers as $broker){
            if($broker->status == 2) {
                $broker->status = 1;
                $broker->save();
                $customerBroker = new CustomBroker();
                $customerBroker['customer_id'] = $customer['id'];
                $customerBroker['broker_id'] = $broker['id'];
                $customerBroker->save();
            }
        }


        $msg = [
            'title' => 'Created!',
            'type' => 'success',
            'text' => 'Supplier created successfully.'
        ];

        return redirect('customers')->with('message', $msg);
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

    public function toDatatable()
    {
        $customers = Customer::where('status', 1)->get();
        return Datatables::of($customers)
            ->addColumn('actions', function ($customers) {
                return view('suppliers.partials.buttons', ['supplier' => $customers]);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
