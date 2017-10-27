<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PortName extends Model
{
    protected $fillable = [
        'name',
        'status',
    ];

    protected $table = 'ports_name';

    public function getPortsName()
    {
        return $this->hasMany('App\PortName','countries_ports_id');
    }

}
