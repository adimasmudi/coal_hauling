<?php

namespace App\Http\Services;

use App\Http\Repositories\DeliveryRepository;
use App\Http\Repositories\VehicleRepository;
use Exception;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class DeliveryService
{
    protected $deliveryRepository;
    protected $vehicleRepository;

    /**
     * Constructor
     *
     * @param Delivery $delivery
     */

    public function __construct(DeliveryRepository $deliveryRepository, VehicleRepository $vehicleRepository)
    {
        $this->deliveryRepository = $deliveryRepository;
        $this->vehicleRepository = $vehicleRepository;
    }

    public function showAll(){
        return $this->deliveryRepository->showAll();
    }

    public function edit($id){
        return $this->deliveryRepository->edit($id);
    }

    public function createAssign(){
        $vehicles = $this->vehicleRepository->getAvailableVehicle();
        $deliveries = $this->deliveryRepository->getDeliveries();
        return view("admin.delivery.assign.create",[
            "vehicles" => $vehicles,
            "deliveries" => $deliveries
        ]);
    }

    public function editAssign($id){
        $vehicles = $this->vehicleRepository->getAvailableVehicle();
        $deliveries = $this->deliveryRepository->getDeliveries();
        $assigned = $this->deliveryRepository->getAssignedDeliveryById($id);
        return view("admin.delivery.assign.update",[
            "vehicles" => $vehicles,
            "deliveries" => $deliveries,
            "assigned" => $assigned
        ]);
    }

    public function save($data){
        $validator = Validator::make($data,[
            'source_address' => 'required',
            'destination_address' => 'required'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->deliveryRepository->save($data);
        return $result;
    }

    public function update($data, $id){
        $validator = Validator::make($data,[
            'source_address' => 'required',
            'destination_address' => 'required'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->deliveryRepository->update($data, $id);
        return $result;
    }

    public function delete($id)
    {

        try {
            $result = $this->deliveryRepository->delete($id);
        } catch (Exception $e) {
            throw new InvalidArgumentException("Error Delete Data");
        }
        return $result;

    }

    public function saveAssign($data){
        $validator = Validator::make($data,[
            'vehicle_id' => 'required',
            'delivery_id' => 'required',
            'note' => 'max:200'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $readyStatus = $this->deliveryRepository->getDeliveryStatusIdByName('ready');
        $data['delivery_status_id'] = $readyStatus->id;
        $result = $this->deliveryRepository->saveAssign($data);
        $this->vehicleRepository->changeAsAssigned($data['vehicle_id']);
        return $result;
    }

    public function updateAssign($data,$id){
        $validator = Validator::make($data,[
            'vehicle_id' => 'required',
            'delivery_id' => 'required',
            'note' => 'max:200'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $readyStatus = $this->deliveryRepository->getDeliveryStatusIdByName('ready');
        $data['delivery_status_id'] = $readyStatus->id;
        $result = $this->deliveryRepository->updateAssign($data,$id);
        $this->vehicleRepository->changeAllAssignedAsAvailable();
        $this->vehicleRepository->changeAsAssigned($data['vehicle_id']);
        return $result;
    }

    public function deleteAssign($id)
    {

        try {
            $result = $this->deliveryRepository->deleteAssign($id);
            $this->vehicleRepository->changeAsAvailable($result->vehicle_id);
        } catch (Exception $e) {
            throw new InvalidArgumentException("Error Delete Data");
        }
        return $result;

    }
}