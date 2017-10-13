<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Remark extends Model
{

  protected $fillable = [
      'note',
      'nameconditions',
      'valuecondition',
      'carrier_id'
  ];

}
