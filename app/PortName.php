<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PortName extends Model
{
    protected $fillable = [
        'code',
        'port_code',
        'port_name',
        'country_ports_id',
        'type_id'
    ];

    protected $table = 'ports_name';

    public function getPortsName()
    {
        return $this->hasMany('App\PortName','countries_ports_id');
    }

    public function getType()
    {
        return $this->hasOne(TypeLocation::class,'id','type_id');
    }

    public function getCountry()
    {
        return $this->hasOne(CountryPort::class,'id','country_ports_id');
    }

}
