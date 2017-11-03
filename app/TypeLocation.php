<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeLocation extends Model
{
    protected $table = 'type_of_locations';

    protected $fillable = [
        'name','status'
    ];
}
