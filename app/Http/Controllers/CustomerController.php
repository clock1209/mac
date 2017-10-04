<?php

namespace App\Http\Controllers;

use App\Broker;
use App\Providers\BroadcastServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Facades\Datatables;
use App\Customer;
use App\Country;
use App\CoutryCode;

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
        $area_codes=Country::pluck('area_code', 'code')->toArray();
        $countriesCode = [];
        foreach ($area_codes as $code => $area_code) {
            $countriesCode = array_merge($countriesCode, ['_'.$area_code => $code . ' +' . $area_code]);
        }
        return view('customers.create', ['countries' => $countries],compact('countriesCode'));
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

        $customer = new Customer($request->all());
        $customer->save();
        $customerLast = Customer::all()->last();
        $brokers = Broker::all();
        foreach ($brokers as $broker){
            if($broker->customer_id == null) {
                $broker->customer_id= $customerLast['id'];
                $broker->save();
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
        $customer= Customer::find($id);
        $countries = [null => 'Select country'];
        $countries = array_merge($countries, Country::pluck('name', 'name')->toArray());
        $countriesCode=CoutryCode::pluck('name','code');
        return view('customers.edit', ['customer'=>$customer],compact('countriesCode','countries'));
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
        $this->validate($request, $this->rules());

        $customer= Customer::find($id);
        $customer->fill($request->all());
        $customer->save();

        $msg = [
            'title' => 'Edited!',
            'type' => 'success',
            'text' => 'Customer edited successfully.'
        ];

        return redirect('customers')->with('message', $msg);
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

    public function deleteCustomerBroker()
    {
     Broker::where('customer_id',null)->delete();
     return view('customers.index');
    }

    public function CustomerStatus(Customer $customer)
    {
        $customer->status = ($customer->status == 1) ? 0 : 1;
        $customer->save();

        $msg = [
            'title' => 'Deleted!',
            'type' => 'success',
            'text' => 'Customer deleted successfully.'
        ];

        return response()->json($msg);
    }

    public function toDatatable()
    {
        $customers = Customer::where('status', 1)->get();
        return Datatables::of($customers)
            ->editColumn('phone', function ($customers) {
                return $customers->countrycode.' '.$customers->phone;
            })
            ->addColumn('actions', function ($customers) {
                return view('customers.partials.buttons', ['customer' => $customers]);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
    private function rules()
    {
        return [
            'name' => 'required',
            'business_name' => 'required',
            'rfc' => 'required',
            'countrycode' => 'required',
            'phone' => 'required|numeric|digits:10',
            'street' => 'required',
            'outside_number' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'zipcode' => 'required|numeric',
            'email' => 'required|email',
            'contact_name' => 'required',
            'contact_job' => 'required'
        ];
    }
}
