<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoutryCode extends Model
{
    protected $table = 'country_codes';

    protected $fillable = [
        'id',
        'name',
        'code'
    ];
}
