<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Port extends Model
{
    protected $table = 'ports';

    protected $fillable = [
        'place_of_load',
        'shipper_id'
    ];

    public function shipper()
    {
      return $this->hasOne(Shipper::class,'id','shipper_id');
    }
}
