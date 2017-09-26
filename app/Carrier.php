<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrier extends Model
{
  protected $fillable = [
      'id',
      'name',
      'abbreviation',
      'status',
  ];

  public function customCarrierPort()
  {
      return $this->hasMany(CarrierPort::class,'carrier_id','id');
  }

}
