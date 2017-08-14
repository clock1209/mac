<?php

namespace App\Http\Controllers;

use App\shipment;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;

class ShipmentController extends Controller
{
    /*
     * by: Octavio Cornejo
     * select element for shipments options on datatable
     */
    private $docs = [
        'DOCS',
        'AMS',
        'Edit AMS',
        'Dates',
        'Advice notice',
        'AMANAC',
        'Letters',
        'HBL control',
        'Releasse AA'
    ];

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
        $shipments = Shipment::with('scheduleOptions');
        return Datatables::eloquent($shipments)
            ->editColumn('etd', function ($shipment) {
                return $shipment->scheduleOptions[0]->etd;
            })
            ->editColumn('atd', function ($shipment) {
                return $shipment->scheduleOptions[0]->departures;
            })
            ->editColumn('eta', function ($shipment) {
                return $shipment->scheduleOptions[0]->eta;
            })
            ->editColumn('final_arrived', function () {
                return 'NA';
            })
            ->editColumn('booking_no', function () {
                return 'NA';
            })
            ->editColumn('status', function () {
                return 'NA';
            })
            ->editColumn('released_to_aa', function () {
                return 'NA';
            })
            ->addColumn('actions', function () {
                return view('shipments.partials.buttons', ['docs' => $this->docs]);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
