<?php

namespace App\Http\Services;

use App\Http\Repositories\VehicleCategoryRepository;
use App\Http\Repositories\VehicleRepository;
use Exception;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;
use Illuminate\Support\Facades\Storage;

class VehicleService
{
    protected $vehicleRepository;
    protected $vehicleCategoryRepository;

    public function __construct(VehicleRepository $vehicleRepository, VehicleCategoryRepository $vehicleCategoryRepository)
    {
        $this->vehicleRepository = $vehicleRepository;
        $this->vehicleCategoryRepository = $vehicleCategoryRepository;
    }

    public function showAll(){
        return $this->vehicleRepository->showAll();
    }

    public function create(){
        $vehicleCategories = $this->vehicleCategoryRepository->getAll();
        $vehicleStatusses = $this->vehicleRepository->getVehicleStatusses();
        return view("admin.vehicle.create", [
            "vehicle_categories" => $vehicleCategories,
            "vehicle_statusses" => $vehicleStatusses
        ]);
    }

    public function save($data){
        $validator = Validator::make($data,[
            'name' => 'required|max:255',
            'vehicle_category_id' => 'required',
            'vehicle_status_id' => 'required',
            'description' => 'max:255',
            'image' => 'mimes:jpeg,png,bmp,tiff |max:4096',
            'weight' => 'numeric',
            'height' => 'numeric',
            'length' => 'numeric',
            'width' => 'numeric',
            'capacity' => 'numeric',
            'number_plate' => 'required',
            'fuel_needed' => 'numeric',
            'fuel_remaining' => 'numeric'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        return $this->vehicleRepository->save($data);
    }
}