<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\CountryPort;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
            return $this->toDatatable();
        $countries = [null => ' '];
        $countries = array_merge($countries, Country::pluck('name', 'name')->toArray());
        $cities =City::pluck('name', 'country')->toArray();

        return view('country.index',['countries'=>$countries]);
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
        Country::create($request->all());
        return response()->json('ok');
    }

    private function rules()
    {
        return [
            'code'      => 'required|alpha|min:2|max:20',
            'name'      => 'required|regex:/^[(a-zA-Z\sáéíóúÁÉÍÓÚÑñ)]+$/u|min:2|max:50',
            'area_code' => 'required|numeric|digits_between:1,10',
        ];
    }

    private function ruleMessages()
    {
        return [
            'code.min'      => 'The abbreviation must be 2 characters at least.',
            'code.alpha'    => 'The abbreviation may only contain letters.',
            'code.max'      => 'The abbreviation may not be greater than 20 characters.',
            'code.required' => 'The abbreviation field is required.',
            'name.regex'    => 'The :attribute may only contain letters and spaces.',
        ];
    }

    public function toDatatable()
    {

      $cities = City::select(['id', 'name','country'])->limit(20000)->get();
          return Datatables::of($cities)
              ->addColumn('actions', function ($cities) {
                  return view('country.partials.buttons', ['cities' => $cities]);
              })
              ->rawColumns(['actions'])
              ->make(true);
    }

    public function edit(CountryPort $country)
    {
        return response()->json($country);
    }
}
