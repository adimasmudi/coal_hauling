<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\VehicleCategoryController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\WarehouseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function(){
    Route::get("/", [DashboardController::class, 'home']);
    Route::get("/login", [DashboardController::class, 'showLoginForm']);

    Route::group(['prefix' => 'delivery'], function(){
        Route::get("/", [DeliveryController::class, 'index']);
    });

    Route::group(['prefix' => 'department'], function(){
        Route::get("/", [DepartmentController::class, 'index']);
    });

    Route::group(['prefix' => 'maintenance'], function(){
        Route::get("/", [MaintenanceController::class, 'index']);
    });

    Route::group(['prefix' => 'partner'], function(){
        Route::get("/", [PartnerController::class, 'index']);
    });

    Route::group(['prefix' => 'vehicle-category'], function(){
        Route::get("/", [VehicleCategoryController::class, 'index']);
    });

    Route::group(['prefix' => 'vehicle'], function(){
        Route::get("/", [VehicleController::class, 'index']);
    });

    Route::group(['prefix' => 'warehouse'], function(){
        Route::get("/", [WarehouseController::class, 'index']);
    });
});

