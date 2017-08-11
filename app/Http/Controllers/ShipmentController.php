<?php

namespace App\Http\Controllers;

use App\shipment;
use Illuminate\Http\Request;
//use Yajra\Datatables;
use Yajra\Datatables\Facades\Datatables;

class ShipmentController extends Controller
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
        return view('shipments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shipments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function show(shipment $shipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function edit(shipment $shipment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, shipment $shipment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(shipment $shipment)
    {
        //
    }

    /*
     * by: Octavio Cornejo
     * Creates datatable
     */
    public function toDatatable()
    {
        $shipments = Shipment::with('scheduleOption')->get();
        dd($shipments[0]->scheduleOption->carrier);
//        foreach($shipments as $shipment){
//            dd($shipment->scheduleOption->carrier);
//        }
        return Datatables::eloquent($shipments)
            ->addColumn('action', function ($shipment) {
                dd($shipment->scheduleOption->carrier);
                return 'hola';
//                return view('shipments.partials.buttons', ['shipment' => $shipment]);
            })
//            ->editColumn('status', function ($shipment) {
//                return ($shipment->status == 1) ? "Activo" : "Inactivo";
//            })
            ->make(true);
    }
}
