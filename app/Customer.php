<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'business_name',
        'rfc',
        'phone',
        'street',
        'outside_number',
        'interior_number',
        'suburb',
        'city',
        'state',
        'country',
        'zipcode',
        'email',
        'contact_name',
        'contact_job',
        'status',
    ];
}
