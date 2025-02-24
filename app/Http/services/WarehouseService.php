<?php

namespace App\Http\Services;

use App\Http\Repositories\WarehouseRepository;
use Exception;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;
use Illuminate\Support\Facades\Storage;

class WarehouseService
{
    protected $warehouseRepository;

    public function __construct(WarehouseRepository $warehouseRepository)
    {
        $this->warehouseRepository = $warehouseRepository;
    }

    public function showAll(){
        return $this->warehouseRepository->showAll();
    }

    public function showEdit($id){
        return $this->warehouseRepository->showEdit($id);
    }

    public function save($data){
        $validator = Validator::make($data,[
            'name' => 'required',
            'description' => 'max:255'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->warehouseRepository->save($data);
        return $result;
    }

    public function update($data, $id){
        $validator = Validator::make($data,[
            'name' => 'required',
            'description' => 'max:255'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->warehouseRepository->update($data, $id);
        return $result;
    }

    public function delete($id)
    {

        try {
            $result = $this->warehouseRepository->delete($id);
        } catch (Exception $e) {
            throw new InvalidArgumentException("Error Delete Data");
        }
        return $result;

    }
}