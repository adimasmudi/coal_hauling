<?php

namespace App\Http\Repositories;

use App\Models\SparePart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class WarehouseRepository
{
    protected $sparePart;
    /**
     * Constructor
     *
     * @param SparePart $sparePart
     */

    public function __construct(SparePart $sparePart)
    {
        $this->sparePart = $sparePart;
    }

    public function showAll(){
        $spareParts = $this->sparePart::simplePaginate(10);
        return view('admin.warehouse.index',[
            'spare_parts' => $spareParts
        ]);
    }

    public function showEdit($id){
        $sparePart = $this->sparePart::where('id',$id)->first();
        return view('admin.warehouse.edit',[
            'spare_part' => $sparePart
        ]);
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
}