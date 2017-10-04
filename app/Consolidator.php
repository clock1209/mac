<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consolidator extends Model
{
    protected $table = 'consolidators';

    protected $fillable = [
        'abbreviation',
        'name'
    ];

    public function getEditUrlAttribute()
    {
        return route('consolidators.edit', ['id' => $this->id,]);
    }

    public function getStuffUrlAttribute()
    {
        return route('stuffs.consolidator', ['id' => $this->id,]);
    }

    public function getMccUrlAttribute()
    {
        return route('mcc.consolidator', ['id' => $this->id,]);
    }

    public function stuffs()
    {
        return $this->hasMany('App\Stuff');
    }

    public function mccs()
    {
        return $this->hasMany('App\Mcc');
    }
}
