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

    public function show(string $id){
        return $this->deliveryService->show($id);
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
            Alert::success("Success","New delivery successfully added");
        } catch (Exception $e) {
            Alert::error("Error","Error add delivery");
            return back();
        }

        return redirect("/admin/delivery");
    }

    public function update(Request $request, string $id){
        $data = $request->all();
        try {
            $this->deliveryService->update($data, $id);
            Alert::success("Success","Delivery data updated successfully");
        } catch (Exception $e) {
            Alert::error("Error","Error update delivery");
            return back();
        }

        return redirect("/admin/delivery");
    }

    public function destroy(String $id)
    {
        try {
            $this->deliveryService->delete($id);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to delete item'], 500);
        }

        return response()->json(['message' => 'Success delete item'], 200);
    }

    public function deliveryStatusUpdate(Request $request, string $delivery_id, string $vehicle_delivery_id){
        $data = $request->all();
        try {
            $this->deliveryService->deliveryUpdateStatus($data, $vehicle_delivery_id);
            Alert::success("Success","Delivery data updated successfully");
        } catch (Exception $e) {
            Alert::error("Error","Error update delivery");
            return back();
        }

        return redirect("/admin/delivery/show/".$delivery_id);
    }

    public function deliver(){
        try {
            $this->deliveryService->deliverAll();
            Alert::success("Success","Success deliver using assigned vehicles");
        } catch (Exception $e) {
            Alert::error("Error","Error deliver all");
            return back();
        }

        return redirect("/admin/delivery");
    }

    public function saveAssign(Request $request){
        $data = $request->all();

        try {
            $this->deliveryService->saveAssign($data);
            Alert::success("Success","Success assign new vehicle");
        } catch (Exception $e) {
            Alert::error("Error","Error assign vehicle");
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
            Alert::error("Error","Error update assign vehicle");
            return back();
        }

        return redirect("/admin/delivery");
    }

    public function destroyAssign(String $id)
    {
        try {
            $this->deliveryService->deleteAssign($id);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to delete item'], 500);
        }

        return response()->json(['message' => 'Success delete item'], 200);
    }
}
