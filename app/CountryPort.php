<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountryPort extends Model
{
    protected $fillable = [
        'code',
        'port_name'
    ];

    protected $table = 'countries_ports';

}
