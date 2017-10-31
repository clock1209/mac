<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inlandscharges extends Model
{
  protected $table = 'inland_charges';

  protected $fillable = [
      'id',
      'type',
      'dischargeport_id',
      'delivery_id',
      'rangeup',
      'rangeto',
      'cost',
      'container',
      'currency',
      'discharge_country_ports_id',
      'delivery_country_ports_id',
  ];

}
