<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
  protected $table = 'pricecal';

  protected $fillable = [
      'name',
      'status'
  ];
}
