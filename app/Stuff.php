<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stuff extends Model
{
    protected $fillable = [
        'concepts',
        'cost',
        'type',
        'agreed_cost',
        'status',
        'currency',
        'consolidator_id',
    ];

    public function getEditUrlAttribute()
    {
        return route('stuffs.edit', ['id'=>$this->id]);
    }

    public function consolidators()
    {
        return $this->belongsTo('App\Consolidator');
    }
}
