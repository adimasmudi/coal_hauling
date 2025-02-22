<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VehicleCategoryController extends Controller
{
    public function index(){
        return view('admin.vehicle_category.index');
    }
}
