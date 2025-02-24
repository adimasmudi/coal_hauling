<?php

namespace App\Http\Controllers;

use App\Http\Services\DashboardService;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    protected $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function home(){
        if(!session('admin')){
            return redirect('/admin/login');
        }
        
        return $this->dashboardService->home();
    }

    public function showLoginForm(){
        if(session('admin')){
            return redirect('/admin');
        }
        return view('admin.login');
    }

    public function authenticate(Request $request){
        $data = $request->except(['_token', '_method']);;
        try {
            [$admin,$token] = $this->dashboardService->authenticate($data);
            $request->session()->put('admin', [$admin,$token]);
            $request->session()->regenerate();
            Alert::success("Success","Success Login");
        } catch (Exception $e) {
            Alert::error("Error",$e->getMessage());
            return back();
        }

        return redirect("/admin");
    }

    public function logout(Request $request){
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Alert::success("Success","Success Logout");
        return redirect('/admin/login');
    }
}
