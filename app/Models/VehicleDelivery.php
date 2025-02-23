<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleDelivery extends Model
{
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class,'vehicle_id');
    }

    public function status()
    {
        return $this->belongsTo(DeliveryStatus::class,'delivery_status_id');
    }
}
