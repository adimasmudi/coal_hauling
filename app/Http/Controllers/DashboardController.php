<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home(){
        // if(session('admin')){
        //     return redirect('/admin');
        // }
        // return view('admin.login');
        return view("admin.dashboard");
    }

    public function showLoginForm(){
        return view('admin.login');
    }
}
