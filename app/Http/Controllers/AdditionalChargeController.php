<?php

namespace App\Http\Controllers;

use App\AdditionalCharge;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;

class AdditionalChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->toDatatable($request->supplier_id);
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
//        dd($request->all());
        $this->validate($request, $this->rules());

        AdditionalCharge::create($request->all());

        $msg = [
            'title' => 'Created!',
            'type' => 'success',
            'text' => 'Additional charge created successfully.'
        ];

        return response()->json($msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AdditionalCharge  $additionalCharge
     * @return \Illuminate\Http\Response
     */
    public function show(AdditionalCharge $additionalCharge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdditionalCharge  $additionalCharge
     * @return \Illuminate\Http\Response
     */
    public function edit(AdditionalCharge $additionalCharge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdditionalCharge  $additionalCharge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdditionalCharge $additionalCharge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdditionalCharge  $additionalCharge
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdditionalCharge $additionalCharge)
    {
        //
    }

    /*
     * Changes additionalCharge status
     */
    public function additionalChargeStatus(AdditionalCharge $additionalCharge)
    {
        $additionalCharge->status = ($additionalCharge->status == 1) ? 0 : 1;
        $additionalCharge->save();

        $msg = [
            'title' => 'Deleted!',
            'type' => 'success',
            'text' => 'Additional charge deleted successfully.'
        ];

        return response()->json($msg);
    }

    /*
     * by: Octavio Cornejo
     * Creates datatable
     */
    public function toDatatable($id)
    {
        $additionalCharges = AdditionalCharge::where('supplier_id', $id)->where('status', 1)->get();
        return Datatables::of($additionalCharges)
            ->addColumn('actions', function ($additionalCharge) {
                return view('additionalCharges.partials.buttons', ['additionalCharge' => $additionalCharge]);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    private function rules()
    {
        return [
            'concept' => 'required',
            'collect_prepaid' => 'required',
            'import_export' => 'required',
            'amount' => 'required|numeric',
            'currency' => 'required',
            'last_updated' => 'required',
            'charge_type' => 'required',
            'charge' => 'required',
            'notes' => 'required',
        ];
    }
}
