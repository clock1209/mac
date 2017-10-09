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
        'countrycode',
        'zipcode',
        'email',
        'contact_name',
        'contact_job',
        'status',
    ];

    public function setCountrycodeAttribute($value)
    {
        $this->attributes['countrycode'] = str_replace('_', '', $value);
    }

    public function customBrokers()
    {
        return $this->hasMany(Broker::class,'customer_id','id');
    }

   public function customDocs()
   {
       return $this->hasMany(Doc::class,'customer_id','id');
   }
}
