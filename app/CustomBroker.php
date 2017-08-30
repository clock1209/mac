<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomBroker extends Model
{
    protected $fillable = [
        'name',
        'patent',
        'email',
        'phone',
        'status',
    ];
}
