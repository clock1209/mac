<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RemarkCondition extends Model
{
    protected $table = 'remarks_conditions';

    protected $fillable = [
        'free_demurrage',
        'after_eta',
        'eta_day',
        'operation',
        'price_day',
        'carrier_id',
        'status',
        'type_demurrage',
    ];
}
