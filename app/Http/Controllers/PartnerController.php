<?php

namespace App\Http\Controllers;

use App\Http\Services\PartnerService;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PartnerController extends Controller
{
    protected $partnerService;

    public function __construct(PartnerService $partnerService)
    {
        $this->partnerService = $partnerService;
    }
    public function index(){
        return $this->partnerService->showAll();
    }

    public function create(){
        return $this->partnerService->create();
    }

    public function edit(string $id){
        return $this->partnerService->edit($id);
    }

    public function save(Request $request){
        $data = $request->all();
        try {
            
            $this->partnerService->save($data);
            Alert::success("Success","Success Add New Partner");
        } catch (Exception $e) {
            Alert::error("Error","Error add new partner");
            return back();
        }

        return redirect("/admin/partner");
    }

    public function update(Request $request, string $id){
        $data = $request->all();
        try {
            
            $this->partnerService->update($data, $id);
            Alert::success("Success","Success update partner");
        } catch (Exception $e) {
            Alert::error("Error","Error update partner");
            return back();
        }

        return redirect("/admin/partner");
    }

    public function destroy(String $id)
    {
        try {
            $this->partnerService->delete($id);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to delete item'], 500);
        }

        return response()->json(['message' => 'Success delete item'], 200);
    }
}
