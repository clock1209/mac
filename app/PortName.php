<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PortName extends Model
{
  protected $fillable = [
      'name',
      'status',
  ];

 protected $table = 'portsname';
}
