<?php

namespace App\Http\Controllers;

use App\Shipper;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use App\Country;

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
        $countries = [null => 'Select country'];
        $countries = array_merge($countries, Country::pluck('name', 'name')->toArray());
        $area_codes = Country::pluck('area_code', 'code')->toArray();
        $array = [];
        foreach ($area_codes as $code => $area_code) {
            $array = array_merge($array, ['_'.$area_code => $code . ' +' . $area_code]);
        }
        return view('shippers.create', ['countries' => $countries, 'area_codes' => $array]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules(), $this->ruleMessages());

        $data = $request->all();
        if ($data['phone'] != null) {
            $areacode = str_replace('_', '', $data['area_code']);
            $data['phone'] = $areacode . ' ' . $data['phone'];
        }
        Shipper::create($data);

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
        $countries = Country::pluck('name', 'name');
        $area_codes = Country::pluck('area_code', 'code')->toArray();
        $areacode = null; $phone = null;
        if ($shipper->phone != null) {
            list($areacode, $phone) = explode(' ', $shipper->phone);
            $areacode = '_' . $areacode;
        }
        $array = [];
        foreach ($area_codes as $code => $area_code) {
            $array = array_merge($array, ['_'.$area_code => $code . ' +' . $area_code]);
        }
        return view('shippers.edit', ['shipper' => $shipper, 'countries' => $countries, 'area_codes' => $array,
            'areacode' => $areacode, 'phone' => $phone]);
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
        $this->validate($request, $this->rules(), $this->ruleMessages());

        $data = $request->all();
        $areacode = str_replace('_', '', $data['area_code']);
        $data['phone'] = $areacode . ' ' . $data['phone'];
        $shipper->fill($data);
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
            'name' => 'nullable',
            'email' => 'nullable|email',
            'phone' => 'nullable|size:10',
            'business_name' => 'nullable',
            'street' => 'nullable',
            'street_number' => 'nullable|numeric',
            'neighborhood' => 'nullable',
            'city' => 'nullable',
            'country' => 'nullable',
            'zip_code' => 'nullable|numeric',
            'rfc_taxid' => 'nullable|alpha_num'
        ];
    }

    private function ruleMessages()
    {
        return [
            'regex' => 'The phone must be 10 numbers long'
        ];
    }
}
