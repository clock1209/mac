<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoicedTo extends Model
{
    protected $table = 'invoiced_to';
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
        'country_code',
        'zip_code',
        'email',
        'contact_name',
        'contact_job',
        'status',
        'customer_id',
        'country_id'
    ];
}
