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
}
