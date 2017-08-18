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

        Shipper::create($request->all());

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
        $shipper->load('ports');
        return view('ports.index',compact('shipper'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shipper  $shipper
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipper $shipper)
    {
        return view('shippers.edit', ['shipper' => $shipper]);
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
        $this->validate($request, $this->rules());

        $shipper->fill($request->all());
        $shipper->save();

        $msg = [
            'title' => 'Edited!',
            'type' => 'success',
            'text' => 'Shipper edited successfully.'
        ];

        return redirect('shippers')->with('message', $msg);
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
     * Changes shipper status
     */
    public function shipperStatus(Shipper $shipper)
    {
        $shipper->status = ($shipper->status == 1) ? 0 : 1;
        $shipper->save();

        $msg = [
            'title' => 'Deleted!',
            'type' => 'success',
            'text' => 'Shipper deleted successfully.'
        ];

        return response()->json($msg);
    }

    /*
     * by: Octavio Cornejo
     * Creates datatable
     */
    public function toDatatable()
    {
        $shippers = Shipper::where('status', 1)->get();
        return Datatables::of($shippers)
            ->addColumn('actions', function ($shipper) {
                return view('shippers.partials.buttons', ['shipper' => $shipper]);
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
            'phone' => 'required|numeric',
            'business_name' => 'required',
            'street' => 'required',
            'street_number' => 'required|numeric',
            'neighborhood' => 'required',
            'city' => 'required',
            'country' => 'required',
            'zip_code' => 'required|numeric',
            'rfc_taxid' => 'numeric'
        ];
    }
}
