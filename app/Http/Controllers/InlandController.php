<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Remark;
use App\Subject;
use App\Concepts;
use App\Inlandscharges;
use App\PortName;
use App\CountryPort;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class InlandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $value = $request->session()->get('carrier_id');
        if ($request->ajax())
            return $this->toDatatable($value);

        return view('remarks.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        session()->put('tab', 3);
        $request->flash();
        $value = $request->session()->get('carrier_id');
        $this->validate($request, $this->rules());

        $inlandscharges = Inlandscharges::create($request->all());
        $inlandscharges->dischargeport_id = $request->dischargeport_id;
        $inlandscharges->delivery_id = $request->delivery_id;
        $inlandscharges->carrier_id = $value;
        $inlandscharges->save();

        $msg = [
            'title' => 'Created!',
            'type' => 'success',
            'text' => 'Inlands created successfully.'
        ];

        return redirect('/remarks?id='.$value)->with(['tab'=> 3,'message'=> $msg]) ;

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
    public function edit($inlands)
    {
        session()->put('tab', 3);
        $inland = Inlandscharges::find($inlands);
        $concepts = Concepts::pluck('name', 'id')->where('status',1)->toArray();
        $country_port = CountryPort::pluck('port_name', 'id')->toArray();
        $port_discharge = PortName::where('country_ports_id',$inland->discharge_country_ports_id)->pluck('port_name', 'id')->toArray();
        $port_delivery = PortName::where('country_ports_id',$inland->delivery_country_ports_id)->pluck('port_name', 'id')->toArray();

        return view('remarks.index',['tab'=> 3,'port' => [null],'inlands' => $inland,
            'country_port'=>$country_port,'port_discharge'=>$port_discharge,'port_delivery'=>$port_delivery,'overweight' => 0,'subject' => 0,
                'concepts' => $concepts,'idCarrier'=> $inland->carrier_id]);

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

        $inland = Inlandscharges::find($id);
        $this->validate($request, $this->rules());
        $inland->fill($request->all());
        $inland->save();

        $msg = [
            'title' => 'Edited!',
            'type' => 'success',
            'text' => 'Inlands edited successfully.'
        ];

        return redirect('/remarks?id='.$inland->carrier_id)->with(['tab'=> 3,'message'=> $msg,'overweight' => 0,'concepts'=>0,'subject'=>0,'inlands'=>$inland]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($inlands)
    {
        $inland = Inlandscharges::find($inlands);
        $inland->status = ($inland->status == 1) ? 0 : 1;
        $inland->save();

        $msg = [
            'title' => 'Deleted!',
            'type' => 'success',
            'text' => 'Subject deleted successfully.'
        ];

        return response()->json($msg);

    }

    public function toDatatable($id)
    {

        $inlandscharges = DB::table('inland_charges')
        ->join('ports_name as dischargeport', 'inland_charges.dischargeport_id', '=', 'dischargeport.id')
        ->join('ports_name as delivery', 'inland_charges.delivery_id', '=', 'delivery.id')
        ->select('inland_charges.id','inland_charges.dischargeport_id','inland_charges.delivery_id',
        'inland_charges.rangeup','inland_charges.rangeto','inland_charges.cost','inland_charges.container',
        'inland_charges.currency','inland_charges.status','dischargeport.port_name as nameone',
        'delivery.port_name as nametwo','inland_charges.type')->where('inland_charges.carrier_id',$id)
        ->where('inland_charges.status',1)->get();

        return Datatables::of($inlandscharges)
            ->addColumn('actions', function ($inlandscharges) {
                return view('inlandscharges.partials.buttons', ['inlands' => $inlandscharges]);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    private function rules()
    {
        return [
            'type' => 'required|not_in:0',
            'cost' => 'required|not_in:0|numeric',
            'dischargeport_id' => 'required|not_in:0',
            'delivery_id' => 'required|not_in:0',
            'container' => 'required|not_in:0',
            'currency' => 'required|not_in:0',
            'rangeup' => 'required|not_in:0',
            'rangeto' => 'required|not_in:0',
            'cost' => 'required|regex:/^\d*(\.\d{2})?$/|max:999999.99|numeric|',
            'discharge_country_ports_id' => 'required',
            'delivery_country_ports_id' => 'required',
        ];
    }

}
