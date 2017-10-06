<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Broker extends Model
{
    protected $fillable = [
        'name',
        'patent',
        'email',
        'customer_id',
        'countrycode',
        'phone',
        'status',
    ];

    public function setCountrycodeAttribute ($value)
    {
        $this->attributes['countrycode'] = str_replace('_', '', $value);
    }
}
