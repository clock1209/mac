<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CarrierPort;
use App\Carrier;
use App\PortName;
use App\Price;
use Yajra\Datatables\Facades\Datatables;

class CarrierPortController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!auth()->user())
        return abort(404);
        if ($request->ajax()) {
            return $this->toDatatable($request->id);
        }

        return view('carrierport.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $price = Price::select('id','name') ->where('status', '=', 1)->get();
        $ports = [0 => ' '];
        $ports = array_merge($ports, PortName::pluck('name', 'id')->toArray());

        return view('carrierport.create', ['port' => $ports, 'prices' => $price,'id' => $request->id]);
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
        CarrierPort::create($request->all());

        $msg = [
            'title' => 'Created!',
            'type' => 'success',
            'text' => 'Carrier Port created successfully.'
        ];

        return redirect('/carrierport?id='.$request->carrier_id)->with('message', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
      //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrierport $carrierport)
    {
        $price = Price::select('id','name') ->where('status', '=', 1)->get();
        $ports = [0 => ' '];
        $ports = array_merge($ports, PortName::pluck('name', 'id')->toArray());

        return view('carrierport.edit', ['port' => $ports,'prices'=>$price, 'carrierport' => $carrierport,'id' => $carrierport->carrier_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarrierPort $carrierport)
    {
        $request->flash();
        if($request->include_subagent==1){
            $carrierport->include_subagent = $request->include_subagent;
        }
        else{
            $carrierport->include_subagent =0;
        }

        $this->validate($request, $this->rules());
        $carrierport->fill($request->all());
        $carrierport->save();

        $msg = [
            'title' => 'Edited!',
            'type' => 'success',
            'text' => 'Carrier port edited successfully.'
        ];

        return redirect('/carrierport?id='.$carrierport->carrier_id)->with('message', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrierport $carrierport)
    {
        if ($carrierport) {
        $status = $carrierport->status ? 0 : 1;

        if($status) {
            $msg = [
                'title' => 'Activated!',
                'type' => 'success',
                'text' => 'Carrier activaded successfully.'
            ];
          }else {
            $msg = [
                'title' => 'Deleted!',
                'type' => 'success',
                'text' => 'Carrier Port deleted successfully.'
            ];
          }

            $carrierport->status = $status;
            $carrierport->save();
            return response()->json($msg);
        }

        return abort(404);
    }

    public function toDatatable($id)
    {

        $carrierport = Carrier::find($id)->customCarrierPort()
        ->join('portsname', 'portsname.id', '=', 'carrierport.portname_id')
        ->select('carrierport.id','portname_id','departures','arbitraryone'
        ,'arbitrarytwo','arbitrarythree','tt','rate','portsname.name','carrierport.status','rate')
        ->where('status', 1)->get();

        return Datatables::of($carrierport)
            ->addColumn('actions', function ($carrierport) {
                return view('carrierport.partials.buttons', ['carrierport' => $carrierport]);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    private function rules()
    {
        return [
            'rate' => 'required|not_in:0',
            'tt' => 'numeric',
            'portname_id' => 'required|not_in:0',
            'departures' => 'required|not_in:0',
            'arbitraryone' => 'required|numeric',
            'arbitrarytwo' => 'required|numeric',
            'arbitrarythree' => 'required|numeric',
        ];
    }
}
