<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'country'
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }

    public function setCountryAttribute($value)
    {
        $this->attributes['country'] = ucfirst($value);
    }

    public static function getCitiesByCountry($country)
    {
        $cities = City::select('name')->where('country', $country)->get();
        return $cities->toJson();
    }
}
