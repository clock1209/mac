<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mcc extends Model
{
    //
    protected $fillable = [
        'id','cost', 'currency',
    ];
}
