<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomBroker extends Model
{
    protected $fillable = [
        'customer_id',
        'broker_id',
    ];
}
