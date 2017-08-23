<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concepts extends Model
{
    //
    protected $fillable = [
        'id',
        'name',
        'status',
    ];
}
