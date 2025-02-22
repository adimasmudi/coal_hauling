<?php

namespace App\Http\Services;

use App\Http\Repositories\VehicleCategoryRepository;
use Exception;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;
use Illuminate\Support\Facades\Storage;

class VehicleCategoryService
{
    protected $vehicleCategoryRepository;

    public function __construct(VehicleCategoryRepository $vehicleCategoryRepository)
    {
        $this->vehicleCategoryRepository = $vehicleCategoryRepository;
    }

    public function showAll(){
        return $this->vehicleCategoryRepository->showAll();
    }

    public function edit($id){
        return $this->vehicleCategoryRepository->showEdit($id);
    }

    public function save($data){
        $validator = Validator::make($data,[
            'name' => 'required',
            'icon' => 'mimes:jpeg,png,bmp,tiff |max:4096'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->vehicleCategoryRepository->save($data);
        return $result;
    }

    public function update($data, $id){
        $validator = Validator::make($data,[
            'name' => 'required',
            'icon' => 'mimes:jpeg,png,bmp,tiff |max:4096'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->vehicleCategoryRepository->update($data, $id);
        return $result;
    }

    public function delete($id)
    {

        try {
            $result = $this->vehicleCategoryRepository->delete($id);
        } catch (Exception $e) {
            throw new InvalidArgumentException("Error Delete Data");
        }
        return $result;

    }

}