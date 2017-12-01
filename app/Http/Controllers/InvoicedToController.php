<?php

namespace App\Http\Controllers;

use App\InvoicedTo;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;

class InvoicedToController extends Controller
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
//        dd($request->all());
        $this->validate($request, $this->rules());

        $invoiced = new InvoicedTo();
        $invoiced->name = $request->name_inv;
        $invoiced->business_name = $request->business_name_inv;
        $invoiced->rfc = $request->rfc_inv;
        $invoiced->phone = $request->phone_inv;
        $invoiced->street = $request->street_inv;
        $invoiced->outside_number = $request->outside_number_inv;
        $invoiced->suburb = $request->suburb_inv;
        $invoiced->city = $request->city_inv;
        $invoiced->state = $request->state_inv;
        $invoiced->country = $request->country_inv;
        $invoiced->country_code = $request->country_code_inv;
        $invoiced->zip_code = $request->zip_code_inv;
        $invoiced->email = $request->email_inv;
        $invoiced->contact_name = $request->contact_name_inv;
        $invoiced->contact_job = $request->contact_job_inv;
        $invoiced->customer_id = $request->customer_id;
        $invoiced->save();

        return response()->json('ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InvoicedTo  $invoicedTo
     * @return \Illuminate\Http\Response
     */
    public function show(InvoicedTo $invoicedTo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InvoicedTo  $invoicedTo
     * @return \Illuminate\Http\Response
     */
    public function edit(InvoicedTo $invoicedTo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InvoicedTo  $invoicedTo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InvoicedTo $invoicedTo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InvoicedTo  $invoicedTo
     * @return \Illuminate\Http\Response
     */
    public function destroy(InvoicedTo $invoicedTo)
    {
        //
    }

    public function toDatatable()
    {
        return Datatables::of(InvoicedTo::get())
            ->addColumn('actions', function ($invoiced) {
//                return view('invoiced_to.partials.buttons', ['invoiced' => $invoiced]);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    private function rules()
    {
        return [
            'name_inv' => 'required',
            'phone_inv' => 'numeric|digits:10|nullable',
            'zip_code_inv' => 'numeric|nullable',
            'email_inv' => 'email|nullable',
        ];
    }
}
