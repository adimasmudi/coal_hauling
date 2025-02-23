<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    public function category()
    {
        return $this->belongsTo(VehicleCategory::class,'vehicle_category_id');
    }

    public function status()
    {
        return $this->belongsTo(VehicleStatus::class,'vehicle_status_id');
    }
}
