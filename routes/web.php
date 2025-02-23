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
        Route::get("/add", [DeliveryController::class, 'create']);
        Route::get("/edit/{id}", [DeliveryController::class, 'edit']);

        Route::post("/save", [DeliveryController::class, 'save']);
        Route::post("/update/{id}", [DeliveryController::class, 'update']);
        Route::post("/delete/{id}", [DeliveryController::class, 'destroy']);
        
        Route::group(['prefix' => 'assign'], function(){
            Route::get("/add", [DeliveryController::class, 'createAssign']);
            Route::get("/edit/{id}", [DeliveryController::class, 'editAssign']);
            
            Route::post("/save", [DeliveryController::class, 'saveAssign']);
            Route::post("/update/{id}", [DeliveryController::class, 'updateAssign']);
            Route::post("/delete/{id}", [DeliveryController::class, 'destroyAssign']);
        });
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
        Route::get("/add", [VehicleCategoryController::class, 'create']);
        Route::get("/edit/{id}", [VehicleCategoryController::class, 'edit']);

        Route::post("/save", [VehicleCategoryController::class, 'save']);
        Route::post("/update/{id}", [VehicleCategoryController::class, 'update']);
        Route::post("/delete/{id}", [VehicleCategoryController::class, 'destroy']);
    });

    Route::group(['prefix' => 'vehicle'], function(){
        Route::get("/", [VehicleController::class, 'index']);
        Route::get("/show/{id}", [VehicleController::class, 'show']);
        Route::get("/add", [VehicleController::class, 'create']);
        Route::get("/edit/{id}", [VehicleController::class, 'edit']);

        Route::post("/save", [VehicleController::class, 'save']);
        Route::post("/update/{id}", [VehicleController::class, 'update']);
        Route::post("/delete/{id}", [VehicleController::class, 'destroy']);
    });

    Route::group(['prefix' => 'warehouse'], function(){
        Route::get("/", [WarehouseController::class, 'index']);
    });
});

