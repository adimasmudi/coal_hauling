<?php

namespace App\Http\Services;

use App\Http\Repositories\WarehouseRepository;
use App\Models\SparePart;
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

    public function show($id){
        return $this->warehouseRepository->show($id);
    }

    public function showEdit($id){
        return $this->warehouseRepository->showEdit($id);
    }

    public function createSupply($id){
        return $this->warehouseRepository->createSupply($id);
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

    public function saveSupply($data,$id){
        $validator = Validator::make($data,[
            'partner_id' => 'required',
            'quantity' => 'numeric|min:1',
            'note' => 'max:255'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $data['spare_part_id'] = $id;
        $result = $this->warehouseRepository->saveSupply($data);
        $this->warehouseRepository->increaseSparePartQuantity($id, $data['quantity']);
        return $result;
    }

    public function deleteSupply($id, $supply_id)
    {
        try {
            $sparePart = $this->warehouseRepository->getSparePartById($id);
            if (!$sparePart){
                throw new InvalidArgumentException("Sparepart not found");
            }

            $result = $this->warehouseRepository->deleteSupply($supply_id);
            $this->warehouseRepository->descreaseSparePartQuantity($sparePart->id,$result->quantity);
        } catch (Exception $e) {
            throw new InvalidArgumentException("Error Delete Data");
        }
        return $result;
    }
}