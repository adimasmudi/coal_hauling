<?php

namespace App\Http\Repositories;

use App\Models\Vehicle;
use App\Models\VehicleStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VehicleRepository
{
    protected $vehicle;
    protected $vehicleStatusses;

    /**
     * Constructor
     *
     * @param Vehicle $vehicle
     */

    public function __construct(Vehicle $vehicle, VehicleStatus $vehicleStatusses)
    {
        $this->vehicle = $vehicle;
        $this->vehicleStatusses = $vehicleStatusses;
    }

    public function showAll(){
        $vehicles = $this->vehicle::with(['category','status'])->simplePaginate(10);
        return view('admin.vehicle.index', [
            'vehicles' => $vehicles
        ]);
    }

    public function getVehicleStatusses(){
        return $this->vehicleStatusses::all();
    }

    public function save($data){
        $newData = new $this->vehicle;
        $newData->name = $data['name'];
        $newData->vehicle_category_id = $data['vehicle_category_id'];
        $newData->vehicle_status_id = $data['vehicle_status_id'];
        $newData->description = $data['description'];
        $newData->weight = $data['weight'];
        $newData->height = $data['height'];
        $newData->length = $data['length'];
        $newData->width = $data['width'];
        $newData->capacity = $data['capacity'];
        $newData->number_plate = $data['number_plate'];
        $newData->fuel_needed = $data['fuel_needed'];
        $newData->fuel_remaining = $data['fuel_remaining'];
        $newData->save();

        return $newData->fresh();
    }
}