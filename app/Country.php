<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'code',
        'area_code'
    ];

    public function  setCodeAttribute($value)
    {
        $this->attributes['code'] = strtoupper($value);
    }

    public function  setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }

    public static function getCountryCodesPluck()
    {
        $codes = Country::orderBy('code', 'asc')->pluck('area_code', 'code');
        $countryCodes = [];
        foreach ($codes as $key => $code) {
            $countryCodes = array_merge($countryCodes, ['_'.$code => $key . ' +' . $code]);
        }
        return $countryCodes;
    }

    public static function getCountriesPluck()
    {
        $countries = [null => 'Select country'];
        return array_merge($countries, Country::orderBy('name', 'asc')
            ->pluck('name', 'name')->toArray());
    }
}
