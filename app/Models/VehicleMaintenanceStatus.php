<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleMaintenanceStatus extends Model
{
    use HasFactory;

    protected $table = 'vehicle_maintenance_statusses';
    protected $fillable = [
        'name'
    ];
}
