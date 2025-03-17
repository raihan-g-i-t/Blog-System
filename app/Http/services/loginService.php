<?php

namespace App\Http\services;

use Illuminate\Support\Facades\DB;

class loginService{

    public function user_registration($data){
        DB::table('users')->insert([
            'name' => $data->name,
            'email' => $data->email,
            'password' => bcrypt($data->password)

        ]);
    }

}