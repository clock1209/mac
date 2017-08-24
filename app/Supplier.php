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

    public function additionalCharge()
    {
        return $this->hasMany('App\AdditionalCharge');
    }

    public function contact()
    {
        return $this->hasMany('App\SupplierContact');
    }
}
