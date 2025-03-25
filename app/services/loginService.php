<?php

namespace App\services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class loginService{

    public function userLoginValidate(array $data){
        
        return Auth::guard('admin')->attempt($data);
    }
}