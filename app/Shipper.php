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
        'bussines_name',
        'street',
        'street_number',
        'neighborhood',
        'city',
        'country',
        'zip_code',
        'rfc_taxid',
    ];
}
