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
  ];

 protected $table = 'carrierport';

}
