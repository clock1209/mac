<?php

namespace App\Http\Controllers;

use App\Shipper;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;

class ShipperController extends Controller
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
        return view('shippers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shippers.create');
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

        Shipper::create([
            'tradename' => $request['tradename'],
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'business_name' => $request['business_name'],
            'street' => $request['street'],
            'street_number' => $request['street_number'],
            'neighborhood' => $request['neighborhood'],
            'city' => $request['city'],
            'country' => $request['country'],
            'zip_code' => $request['zip_code'],
            'rfc_taxid' => $request['rfc_taxid']
        ]);

        $msg = [
            'title' => 'Created!',
            'type' => 'success',
            'text' => 'Shipper created successfully.'
        ];

        return redirect('shippers')->with('message', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shipper  $shipper
     * @return \Illuminate\Http\Response
     */
    public function show(Shipper $shipper)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shipper  $shipper
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipper $shipper)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shipper  $shipper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shipper $shipper)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shipper  $shipper
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shipper $shipper)
    {
        //
    }

    /*
     * by: Octavio Cornejo
     * Creates datatable
     */
    public function toDatatable()
    {
        $shippers = Shipper::get();
        return Datatables::of($shippers)
            ->addColumn('actions', function () {
                return view('shippers.partials.buttons');
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    private function rules()
    {
        return [
            'tradename' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'business_name' => 'required',
            'street' => 'required',
            'street_number' => 'required',
            'neighborhood' => 'required',
            'city' => 'required',
            'country' => 'required',
            'zip_code' => 'required'
        ];
    }
}
