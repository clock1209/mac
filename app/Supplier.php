<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'abbreviation',
        'type',
        'name',
    ];

    public function bankAccount()
    {
        $this->hasMany('bank_accounts');
    }

    public function aditionalCharge()
    {
        $this->hasMany('aditional_charges');
    }

    public function contact()
    {
        $this->hasMany('contacts');
    }
}
