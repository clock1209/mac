<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mcc extends Model
{
    protected $fillable = [
        'id',
        'cost',
        'currency',
        'consolidator_id',
        'present',
    ];

    public function consolidators()
    {
        return $this->belongsTo('App\Consolidator');
    }
}
