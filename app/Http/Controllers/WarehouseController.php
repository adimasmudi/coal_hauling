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

    public function create(){
        return view('admin.warehouse.create');
    }

    public function edit(string $id){
        return $this->warehouseService->showEdit($id);
    }

    public function save(Request $request){
        $data = $request->all();
        try {
            
            $this->warehouseService->save($data);
            Alert::success("Success","Success Add New Sparepart");
        } catch (Exception $e) {
            Alert::error("Error",$e->getMessage());
            return back();
        }

        return redirect("/admin/warehouse");
    }

    public function update(Request $request, string $id){
        $data = $request->all();
        try {
            
            $this->warehouseService->update($data, $id);
            Alert::success("Success","Success update spare part");
        } catch (Exception $e) {
            Alert::error("Error",$e->getMessage());
            return back();
        }

        return redirect("/admin/warehouse");
    }

    public function destroy(String $id)
    {
        try {
            $this->warehouseService->delete($id);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to delete item: ' . $e->getMessage()], 500);
        }

        return response()->json(['message' => 'Success delete item'], 200);
    }
}
