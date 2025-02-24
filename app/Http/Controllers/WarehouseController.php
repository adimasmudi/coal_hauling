<?php

namespace App\Http\Controllers;

use App\Http\Services\WarehouseService;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class WarehouseController extends Controller
{
    protected $warehouseService;

    public function __construct(WarehouseService $warehouseService)
    {
        $this->warehouseService = $warehouseService;
    }
    public function index(){
        return $this->warehouseService->showAll();
    }

    public function show(string $id){
        return $this->warehouseService->show($id);
    }

    public function create(){
        return view('admin.warehouse.create');
    }

    public function edit(string $id){
        return $this->warehouseService->showEdit($id);
    }

    public function createSupply($id){
        return $this->warehouseService->createSupply($id);
    }

    public function save(Request $request){
        $data = $request->all();
        try {
            $this->warehouseService->save($data);
            Alert::success("Success","Success Add New Sparepart");
        } catch (Exception $e) {
            Alert::error("Error","Error add new sparepart");
            return back();
        }

        return redirect("/admin/warehouse");
    }

    public function update(Request $request, string $id){
        $data = $request->all();
        try {
            $this->warehouseService->update($data, $id);
            Alert::success("Success","Success update sparepart");
        } catch (Exception $e) {
            Alert::error("Error","Error update sparepart");
            return back();
        }

        return redirect("/admin/warehouse");
    }

    public function destroy(String $id)
    {
        try {
            $this->warehouseService->delete($id);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to delete item'], 500);
        }

        return response()->json(['message' => 'Success delete item'], 200);
    }

    public function saveSupply(Request $request, string $id){
        $data = $request->all();
        try {
            
            $this->warehouseService->saveSupply($data,$id);
            Alert::success("Success","Success Supply Sparepart");
        } catch (Exception $e) {
            Alert::error("Error","Error supply sparepart");
            return back();
        }

        return redirect("/admin/warehouse/show/".$id);
    }

    public function destroySupply(String $id, String $supply_id)
    {
        try {
            $this->warehouseService->deleteSupply($id, $supply_id);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to delete item'], 500);
        }

        return response()->json(['message' => 'Success delete item'], 200);
    }
}
