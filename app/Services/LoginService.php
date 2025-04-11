<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginService{

    public function userLoginValidate(array $data){
        
        return Auth::guard('admin')->attempt($data);
    }
}