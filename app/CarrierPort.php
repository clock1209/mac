<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarrierPort extends Model
{
    protected $fillable = [
        'id',
        'portname_id',
        'departures',
        'arbitraryone',
        'arbitrarytwo',
        'arbitrarythree',
        'tt',
        'rate',
        'remarks',
        'pricecal_id',
        'carrier_id',
        'status',
        'sub_arbitrary_one',
        'sub_arbitrary_two',
        'sub_arbitrary_three',
    ];

    protected $table = 'carrierport';

}
