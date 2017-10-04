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
}
