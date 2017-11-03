<?php

namespace App\Http\Controllers;

use Yajra\Datatables\Facades\Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\CountryPort;
use App\PortName;
use App\TypeLocation;

class CityTownController extends Controller
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

        $country_port = CountryPort::pluck('port_name', 'id')->toArray();
        $type = TypeLocation::orderBy('name','ASC')->pluck('name', 'id')->toArray();

        return view('city_towns.index',['country' => $country_port,'type'=>$type]);
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
        //
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

    public function filterToDatatable(Request $request)
    {

        $port =PortName::with('getType')->where('country_ports_id', $request->country)->get();

        return Datatables::of($port)
            ->addColumn('actions', function ($port) {
                return view('city_towns.partials.buttons', ['port' => $port]);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function addCountry(Request $request)
    {
        $this->validate($request, $this->rulesCountries());
        CountryPort::create($request->all());
        return response()->json('ok');
    }

    public function addCity(Request $request)
    {
        $this->validate($request, $this->rulesCities());
        $port = PortName::create($request->all());
        $country = CountryPort::where('id', $request->country_ports_id)->firstOrFail();

        $port->name = $country->port_name;
        $port->code = $country->code;
        $port->save();

        return response()->json('ok');
    }

    private function rulesCountries()
    {
        return [
            'code'      => 'required|alpha|min:2|max:20',
            'name'      => 'required|regex:/^[(a-zA-Z\sáéíóúÁÉÍÓÚÑñ)]+$/u|min:2|max:50',
        ];
    }

    private function rulesCities()
    {
        return [
            'country_ports_id' => 'required',
            'type_id'      => 'required|',
            'port_name'      => 'required|regex:/^[(a-zA-Z\sáéíóúÁÉÍÓÚÑñ)]+$/u|min:2|max:50',
        ];
    }
}
