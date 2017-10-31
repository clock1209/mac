<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountryPort extends Model
{
    protected $fillable = [
        'code',
        'port_name'
    ];

    protected $table = 'country_ports';

}
