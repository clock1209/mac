<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipper extends Model
{
    protected $fillable = [
        'tradename',
        'name',
        'email',
        'phone',
        'business_name',
        'street',
        'street_number',
        'neighborhood',
        'city',
        'country',
        'zip_code',
        'rfc_taxid',
        'customers_id',
    ];

    public function ports()
    {
        return $this->hasMany(Port::class,'shipper_id','id');
    }

    public function getPortUrlAttribute()
    {
        return route('shippers.show', ['id' => $this->id,]);
    }
}
