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
        $vehicles = $this->vehicle::with(['category','status'])->orderBy('updated_at','DESC')->simplePaginate(10);
        return view('admin.vehicle.index', [
            'vehicles' => $vehicles
        ]);
    }

    public function getVehicleById($id){
        return $this->vehicle::where('id',$id)->with(['category','status'])->first();
    }

    public function getVehicleStatusses(){
        return $this->vehicleStatusses::all();
    }

    public function getAvailableVehicle(){
        return $this->vehicle::with(['category','status'])
            ->whereHas('status', function ($query) {
                $query->where('name', 'available');
            })
            ->whereHas('category', function ($query) {
                $query->where('id', 1);
            })
            ->get();
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

    public function update($data, $id){
        $updateData = $this->vehicle::find($id);
        $updateData->name = $data['name'];
        $updateData->vehicle_category_id = $data['vehicle_category_id'];
        $updateData->vehicle_status_id = $data['vehicle_status_id'];
        $updateData->description = $data['description'];
        $updateData->weight = $data['weight'];
        $updateData->height = $data['height'];
        $updateData->length = $data['length'];
        $updateData->width = $data['width'];
        $updateData->capacity = $data['capacity'];
        $updateData->number_plate = $data['number_plate'];
        $updateData->fuel_needed = $data['fuel_needed'];
        $updateData->fuel_remaining = $data['fuel_remaining'];
        $updateData->save();

        return $updateData->fresh();
    }

    public function changeAllAssignedAsAvailable(){
        return $this->vehicle::where('vehicle_status_id', 3)->update(['vehicle_status_id' => 1]);
    }

    public function changeAsAssigned($id){
        $updateData = $this->vehicle::find($id);
        $updateData->vehicle_status_id = 3;
        $updateData->save();

        return $updateData->fresh();
    }

    public function changeAsAvailable($id){
        $updateData = $this->vehicle::find($id);
        $updateData->vehicle_status_id = 1;
        $updateData->save();

        return $updateData->fresh();
    }

    public function delete($id) : Object
    {
        $deleteData = $this->vehicle::findOrfail($id);
        $deleteData->delete();
        return $deleteData;
    }
}