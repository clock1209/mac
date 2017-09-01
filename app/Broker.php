<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Broker extends Model
{
    protected $fillable = [
        'name',
        'patent',
        'email',
        'phone',
        'status',
    ];
}