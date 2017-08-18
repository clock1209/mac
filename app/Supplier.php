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
        return $this->hasMany("App\BankAccount");
    }

    public function aditionalCharge()
    {
        return $this->hasMany('aditional_charges');
    }

    public function contact()
    {
        return $this->hasMany('contacts');
    }
}
