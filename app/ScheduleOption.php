<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduleOption extends Model
{
    protected $fillable = [
        'carrier',
        'vessel',
        'voyage',
        'etd',
        'departures',
        'eta',
        'ams_closing',
        'cy_closing',
        'fcl_cont_cost_20',
        'fcl_cont_cost_40',
        'fcl_cont_cost_40hc',
        'fcl_cont_cost_other',
        'lcl_tm3',
        'lcl_total',
        'fcl_inland_cost_20',
        'fcl_inland_cost_40',
        'fcl_inland_cost_40hc',
        'fcl_inland_cost_other',
    ];


}
