<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdditionalCharge extends Model
{
    protected $fillable = [
        'concept',
        'collect_prepaid',
        'import_export',
        'amount',
        'currency',
        'last_updated',
        'charge_type',
        'charge',
        'notes',
        'supplier_id'
    ];

    public function supplier()
    {
        return $this->belongsTo('App\Supplier');
    }
}
