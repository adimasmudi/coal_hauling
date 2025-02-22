<?php

namespace App\Http\Controllers;

use App\Http\Services\VehicleService;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class VehicleController extends Controller
{
    protected $vehicleService;

    public function __construct(VehicleService $vehicleService)
    {
        $this->vehicleService = $vehicleService;
    }
    public function index(){
        return view('admin.vehicle.index');
    }

    public function create(){
        return $this->vehicleService->create();
    }


    public function save(Request $request){
        $data = $request->all();
        try {
            
            $this->vehicleService->save($data);
            
            // if($data['file'] != []){
            //     $image = [
            //         'id_tempat' => $result['data']->id,
            //         'kategori_id' => $result['data']->kategori_id,
            //         'file' => $data['file']
            //     ];
            //     $result['file'] = $this->fileService->store($image);
            // }
            Alert::success("Success add vehicle","Vehicle add successfully");
        } catch (Exception $e) {
           
            Alert::error("Error add vehicle",$e->getMessage());
            return back();
        }

        return redirect("/admin/vehicle");
    }
}
