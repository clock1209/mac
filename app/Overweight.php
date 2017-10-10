<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Overweight extends Model
{
  protected $table = 'overweight';

  protected $fillable = [
      'container',
      'rangeup',
      'rangeto',
      'rangeup',
      'cost',
      'currency',
      'carrier_id',
  ];
}
