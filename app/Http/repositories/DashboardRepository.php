<?php

namespace App\Http\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use InvalidArgumentException;

class DashboardRepository
{
    protected $user;
    /**
     * Constructor
     *
     * @param User $user
     */

    public function __construct(User $user)
    {
        $this->user = $user;
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