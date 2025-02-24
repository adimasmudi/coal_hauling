<?php

namespace App\Http\Controllers;

use App\Http\Services\VehicleCategoryService;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class VehicleCategoryController extends Controller
{
    protected $vehicleCategoryService;

    public function __construct(VehicleCategoryService $vehicleCategoryService)
    {
        $this->vehicleCategoryService = $vehicleCategoryService;
    }

    public function index(){
        return $this->vehicleCategoryService->showAll();
    }

    public function create(){
        return view('admin.vehicle_category.create');
    }

    public function edit(string $id){
        return $this->vehicleCategoryService->edit($id);
    }

    public function save(Request $request){
        $data = $request->all();
        try {
            $this->vehicleCategoryService->save($data);
            Alert::success("Success","Success add vehicle category");
        } catch (Exception $e) {
            Alert::error("Error","Error add vehicle category");
            return back();
        }

        return redirect("/admin/vehicle-category");
    }

    public function update(Request $request, string $id){
        $data = $request->all();
        try {
            $this->vehicleCategoryService->update($data, $id);
            Alert::success("Success","Success update vehicle category");
        } catch (Exception $e) {
            Alert::error("Error","Error update vehicle category");
            return back();
        }

        return redirect("/admin/vehicle-category");
    }

    public function destroy(String $id)
    {
        try {
            $this->vehicleCategoryService->delete($id);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to delete item'], 500);
        }

        return response()->json(['message' => 'Success delete item'], 200);
    }
}
