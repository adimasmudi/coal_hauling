<?php

namespace App\Http\Repositories;

use App\Models\Delivery;
use App\Models\DeliveryStatus;
use App\Models\VehicleDelivery;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DeliveryRepository
{
    protected $delivery;
    protected $deliveryStatusses;
    protected $vehicleDelivery;

    /**
     * Constructor
     *
     * @param Delivery $delivery
     */

    public function __construct(Delivery $delivery, DeliveryStatus $deliveryStatusses, VehicleDelivery $vehicleDelivery)
    {
        $this->delivery =  $delivery;
        $this->deliveryStatusses = $deliveryStatusses;
        $this->vehicleDelivery = $vehicleDelivery;
    }

    public function showAll(){
        $deliveryStatus = $this->getDeliveryStatusIdByName("ready");
        $assigned = $this->vehicleDelivery::with(['vehicle','status'])->where("delivery_status_id",$deliveryStatus->id)->simplePaginate(10);
        $deliveries = $this->delivery::simplePaginate(10);
        return view('admin.delivery.index',[
            "assigned" => $assigned,
            "deliveries" => $deliveries
        ]);
    }

    public function edit($id){
        $delivery = $this->delivery::where('id',$id)->first();
        return view("admin.delivery.update",[
            "delivery" => $delivery
        ]);
    }

    public function getDeliveries(){
        return $this->delivery::all();
    }

    public function getDeliveryStatusIdByName($name){
        return $this->deliveryStatusses::where('name',$name)->first();
    }

    public function save($data){
        $newData = new $this->delivery;
        $newData->source_address = $data['source_address'];
        $newData->destination_address = $data['destination_address'];
        $newData->save();

        return $newData->fresh();
    }

    public function update($data, $id){
        $updateData = $this->delivery::find($id);
        $updateData->source_address = $data['source_address'];
        $updateData->destination_address = $data['destination_address'];
        $updateData->save();

        return $updateData->fresh();
    }

    public function delete($id) : Object
    {
        $deleteData = $this->delivery::findOrfail($id);
        $deleteData->delete();
        return $deleteData;
    }

    public function getAssignedDeliveryById($id){
        return $this->vehicleDelivery::with(['vehicle'])->where("id",$id)->first();
    }

    public function saveAssign($data){
        $newData = new $this->vehicleDelivery;
        $newData->vehicle_id = $data['vehicle_id'];
        $newData->delivery_id = $data['delivery_id'];
        $newData->delivery_status_id = $data['delivery_status_id'];
        $newData->note = $data['note'];
        $newData->save();

        return $newData->fresh();
    }

    public function updateAssign($data, $id){
        $updateData = $this->vehicleDelivery::find($id);
        $updateData->vehicle_id = $data['vehicle_id'];
        $updateData->delivery_id = $data['delivery_id'];
        $updateData->delivery_status_id = $data['delivery_status_id'];
        $updateData->note = $data['note'];
        $updateData->save();

        return $updateData->fresh();
    }

    public function deleteAssign($id) : Object
    {
        $deleteData = $this->vehicleDelivery::findOrfail($id);
        $deleteData->delete();
        return $deleteData;
    }
}