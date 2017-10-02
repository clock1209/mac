<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
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
}
