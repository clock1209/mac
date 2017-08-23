<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stuff extends Model
{
    //
    protected $fillable = [
        'concepts',
        'cost',
        'type',
        'agreed_cost',
        'status',
        'currency',
    ];
}
