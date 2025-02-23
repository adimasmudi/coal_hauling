<?php

namespace App\Http\Controllers;

use App\Http\Services\DeliveryService;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DeliveryController extends Controller
{
    protected $deliveryService;

    public function __construct(DeliveryService $deliveryService)
    {
        $this->deliveryService = $deliveryService;
    }

    public function index(){
        return $this->deliveryService->showAll();
    }

    public function create(){
        return view("admin.delivery.create");
    }

    public function edit(string $id){
        return $this->deliveryService->edit($id);
    }

    public function createAssign(){
        return $this->deliveryService->createAssign();
    }

    public function editAssign(string $id){
        return $this->deliveryService->editAssign($id);
    }

    public function save(Request $request){
        $data = $request->all();

        try {
            $this->deliveryService->save($data);
            Alert::success("Success add new delivery","New delivery successfully added");
        } catch (Exception $e) {
            Alert::error("Error add delivery",$e->getMessage());
            return back();
        }

        return redirect("/admin/delivery");
    }

    public function update(Request $request, string $id){
        $data = $request->all();
        try {
            $this->deliveryService->update($data, $id);
            Alert::success("Success update delivery","Delivery data updated successfully");
        } catch (Exception $e) {
            Alert::error("Error update delivery",$e->getMessage());
            return back();
        }

        return redirect("/admin/delivery");
    }

    public function destroy(String $id)
    {
        try {
            $this->deliveryService->delete($id);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to delete item: ' . $e->getMessage()], 500);
        }

        return response()->json(['message' => 'Success delete item'], 200);
    }

    public function saveAssign(Request $request){
        $data = $request->all();

        try {
            $this->deliveryService->saveAssign($data);
            Alert::success("Success","Success assign new vehicle");
        } catch (Exception $e) {
            Alert::error("Error assign vehicle",$e->getMessage());
            return back();
        }

        return redirect("/admin/delivery");
    }

    public function updateAssign(Request $request, string $id){
        $data = $request->all();

        try {
            $this->deliveryService->updateAssign($data,$id);
            Alert::success("Success","Success update assigned");
        } catch (Exception $e) {
            Alert::error("Error update assign vehicle",$e->getMessage());
            return back();
        }

        return redirect("/admin/delivery");
    }

    public function destroyAssign(String $id)
    {
        try {
            $this->deliveryService->deleteAssign($id);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to delete item: ' . $e->getMessage()], 500);
        }

        return response()->json(['message' => 'Success delete item'], 200);
    }
}
