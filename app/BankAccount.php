<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    protected $fillable = [
        'pay_of',
        'account',
        'bank',
        'clabe',
        'aba',
        'swift',
        'reference',
        'currency',
        'beneficiary',
        'supplier_id'
    ];

    public function supplier()
    {
        return $this->belongsTo("App\Supplier");
    }
}
