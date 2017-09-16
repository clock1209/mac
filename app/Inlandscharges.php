<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inlandscharges extends Model
{
  protected $table = 'inlandscharges';

  protected $fillable = [
      'type',
      'dischargeport_id',
      'delivery_id',
      'rangeup',
      'rangeto',
      'cost',
      'container',
      'currency',
  ];

}
