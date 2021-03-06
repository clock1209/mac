<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shipment extends Model
{
    protected $fillable = [
        'consignee',
        'shipper',
        'type',
        'rate',
        'place_of_receipt',
        'pol',
        'pod',
        'final_destination',
        'po_number',
        'fcl_container_20',
        'fcl_container_40',
        'fcl_container_40hc',
        'fcl_container_type',
        'lcl_package',
        'lcl_weight',
        'lcl_cbm',
        'cargo_ready',
        'incoterm',
    ];

    public function scheduleOptions() {
        return $this->hasMany("App\ScheduleOption");
    }
}
