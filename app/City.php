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

    public static function getAllCities()
    {
        $cities = City::get()->groupBy('country');
        return $cities->toJson();
    }
}
