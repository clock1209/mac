<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Broker extends Model
{
    protected $fillable = [
        'name',
        'patent',
        'email',
        'customer_id',
        'phone',
        'status',
    ];

}
