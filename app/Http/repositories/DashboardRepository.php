<?php

namespace App\Http\Repositories;

use App\Models\Partner;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleDelivery;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use InvalidArgumentException;

class DashboardRepository
{
    protected $user;
    protected $vehicles;
    protected $vehicleDeliveries;
    protected $partners;
    /**
     * Constructor
     *
     * @param User $user
     * @param Vehicle $vehicle
     * @param VehicleDelivery $vehicleDelivery
     * @param Partner $partner
     */

    public function __construct(User $user, Vehicle $vehicle, VehicleDelivery $vehicleDelivery, Partner $partner)
    {
        $this->user = $user;
        $this->vehicleDeliveries = $vehicleDelivery;
        $this->vehicles = $vehicle;
        $this->partners = $partner;
    }

    public function home(){
        $employees = $this->user::all();
        $vehicles = $this->vehicles::all();
        $vehicleDeliveries = $this->vehicleDeliveries::all();
        $partners = $this->partners::all();
        
        return view("admin.dashboard",[
            "total_employees" => count($employees),
            "total_vehicles" => count($vehicles),
            "total_deliveries" => count($vehicleDeliveries),
            "total_partners" => count($partners)
        ]);
    }

    public function authenticate($data){
        if(!$admin = $this->user::where('email',$data['email'])->where('role_id',1)->first()){
            throw new InvalidArgumentException("wrong email");
        }


        if(!$token = Auth::attempt($data)){
            throw new InvalidArgumentException("wrong credential");
        }

        return [$admin, $token];
    }

    
}