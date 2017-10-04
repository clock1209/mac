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
    ];

    public function consolidators()
    {
        return $this->belongsTo('App\Consolidator');
    }
}
