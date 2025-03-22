<?php

namespace App\services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class loginService{

    public function user_registration($data){
        DB::table('users')->insert([
            'name' => $data->name,
            'email' => $data->email,
            'password' => bcrypt($data->password)

        ]);
    }
    public function userLoginValidate(array $data){
        if(Auth::attempt($data)){
            if(Auth::user()->role==1){
                return 1;
            }else{
                return 0;
            }
        }else{
            return  3;
        }
    }
}