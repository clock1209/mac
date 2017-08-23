<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierContact extends Model
{
    protected $fillable = [
        'select_an_area',
        'name',
        'email',
        'phone',
        'supplier_id'
    ];

    public function supplierContact()
    {
        return $this->belongsTo('App\Supplier');
    }
}
