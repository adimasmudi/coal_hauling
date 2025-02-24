<?php

namespace App\Http\Repositories;

use App\Models\Partner;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PartnerRepository
{
    protected $partner;

    /**
     * Constructor
     *
     * @param Partner $partner
     */

    public function __construct(Partner $partner)
    {
        $this->partner = $partner;
    }

    public function showAll(){
        $partners = $this->partner::orderBy('updated_at','DESC')->simplePaginate();
        return view('admin.partner.index',[
            "partners" => $partners
        ]);
    }

    public function create(){
        return view('admin.partner.create');
    }

    public function showEdit($id){
        $partner = $this->partner::where('id',$id)->first();
        return view('admin.partner.edit',[
            'partner' => $partner
        ]);
    }

    public function save($data){
        $newData = new $this->partner;
        $newData->name = $data['name'];
        $newData->address = $data['address'];
        $newData->partner_status_id = 1;
        $newData->save();

        return $newData->fresh();
    }

    public function update($data, $id){
        $updateData = $this->partner::find($id);
        $updateData->name = $data['name'];
        $updateData->address = $data['address'];
        $updateData->partner_status_id = 1;
        $updateData->save();

        return $updateData->fresh();
    }

    public function delete($id) : Object
    {
        $deleteData = $this->partner::findOrfail($id);
        $deleteData->delete();
        return $deleteData;
    }

}