<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\DB;

class LoginService{

    public function user_registration($data){
        DB::table('users')->insert([
            'name' => $data->name,
            'email' => $data->email,
            'password' => bcrypt($data->password)

        ]);
    }

}