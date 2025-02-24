<?php

namespace App\Http\Repositories;

use App\Models\Partner;
use App\Models\PartnerSupply;
use App\Models\SparePart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class WarehouseRepository
{
    protected $sparePart;
    protected $partner;
    protected $partnerSupply;
    /**
     * Constructor
     *
     * @param SparePart $sparePart
     * @param Partner $partner
     * @param PartnerSupply $partnerSupply
     */

    public function __construct(SparePart $sparePart, Partner $partner, PartnerSupply $partnerSupply)
    {
        $this->sparePart = $sparePart;
        $this->partner = $partner;
        $this->partnerSupply = $partnerSupply;
    }

    public function showAll(){
        $spareParts = $this->sparePart::orderBy('updated_at','DESC')->simplePaginate(10);
        return view('admin.warehouse.index',[
            'spare_parts' => $spareParts
        ]);
    }

    public function show($id){
        $sparePart = $this->sparePart::where('id',$id)->first();
        $partnerSupplies = $this->partnerSupply::where('spare_part_id',$id)->with(['partner'])->orderBy('updated_at','DESC')->simplePaginate(10);
        return view("admin.warehouse.show",[
           "spare_part" => $sparePart,
           "partner_supplies" => $partnerSupplies
        ]);
    }

    public function showEdit($id){
        $sparePart = $this->sparePart::where('id',$id)->first();
        return view('admin.warehouse.edit',[
            'spare_part' => $sparePart
        ]);
    }

    public function createSupply($id){
        $sparePart = $this->sparePart::where('id',$id)->first();
        $partners = $this->partner::all();
        return view('admin.warehouse.supply.create',[
            'spare_part' => $sparePart,
            'partners' => $partners
        ]);
    }

    public function getSparePartById($id){
        return $this->sparePart::where('id',$id)->first();
    }
    
    public function save($data){
        $newData = new $this->sparePart;
        $newData->name = $data['name'];
        $newData->description = $data['description'];
        $newData->quantity = 0;
        $newData->save();

        return $newData->fresh();
    }

    public function update($data, $id){
        $updateData = $this->sparePart::find($id);
        $updateData->name = $data['name'];
        $updateData->description = $data['description'];
        $updateData->save();

        return $updateData->fresh();
    }

    public function delete($id) : Object
    {
        $deleteData = $this->sparePart::findOrfail($id);
        $deleteData->delete();
        return $deleteData;
    }

    public function saveSupply($data){
        $newData = new $this->partnerSupply;
        $newData->partner_id = $data['partner_id'];
        $newData->spare_part_id = $data['spare_part_id'];
        $newData->quantity = $data['quantity'];
        $newData->note = $data['note'];
        $newData->save();

        return $newData->fresh();
    }

    public function increaseSparePartQuantity($id,$newQuantity){
        $updateData = $this->sparePart::find($id);
        $updateData->quantity += $newQuantity;
        $updateData->save();

        return $updateData->fresh();
    }

    public function descreaseSparePartQuantity($id,$quantity){
        $updateData = $this->sparePart::find($id);
        $updateData->quantity -= $quantity;
        $updateData->save();

        return $updateData->fresh();
    }

    public function deleteSupply($id) : Object
    {
        $deleteData = $this->partnerSupply::findOrfail($id);
        $deleteData->delete();
        return $deleteData;
    }

    
}