<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, $this->rules(), $this->ruleMessages());
        City::create($request->all());
        return response()->json('ok');
    }

    private function rules()
    {
        return [
            'name'      => 'required|regex:/^[(a-zA-Z\sáéíóúÁÉÍÓÚÑñ)]+$/u|min:2|max:50',
            'country'   => 'required|regex:/^[(a-zA-Z\sáéíóúÁÉÍÓÚÑñ)]+$/u|min:2|max:50',
        ];
    }

    private function ruleMessages()
    {
        return [
            'name.regex'    => 'The :attribute may only contain letters and spaces.',
        ];
    }
}
