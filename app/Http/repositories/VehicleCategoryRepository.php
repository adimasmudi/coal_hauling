<?php

namespace App\Http\Repositories;

use App\Models\VehicleCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VehicleCategoryRepository
{
    protected $vehicleCategory;

    /**
     * Constructor
     *
     * @param VehicleCategory $vehicleCategory
     */

    public function __construct(VehicleCategory $vehicleCategory)
    {
        $this->vehicleCategory = $vehicleCategory;
    }

    public function getAll(){
        return $this->vehicleCategory::all();
    }

    public function showAll(){
        $vehicleCategory = $this->vehicleCategory::orderBy('updated_at','DESC')->simplePaginate(10);
        return view('admin.vehicle_category.index', [
          'vehicle_category' => $vehicleCategory
        ]);
    }

    public function showEdit($id){
        $vehicleCategory = $this->vehicleCategory::where('id',$id)->first();
        return view('admin.vehicle_category.update',[
            'vehicle_category' => $vehicleCategory
        ]);
    }

    public function save($data){
        $newData = new $this->vehicleCategory;
        $newData->name = $data['name'];
        $newData->save();

        return $newData->fresh();
    }

    public function update($data, $id){
        $updateData = $this->vehicleCategory::find($id);
        $updateData->name = $data['name'];
        $updateData->save();

        return $updateData->fresh();
    }

    public function delete($id) : Object
    {
        $deleteData = $this->vehicleCategory::findOrfail($id);
        $deleteData->delete();
        return $deleteData;
    }



}