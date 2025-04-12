<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class UserService{

    public function loginValidate($data){
        return Auth::attempt($data);
    }
    public function userRegistration($data){
        DB::table('users')->insert([
            'name' => $data->name,
            'email' => $data->email,
            'password' => bcrypt($data->password)

        ]);
    }

    public function userList(){
        $users = User::where('role', USER)
        ->select(['id', 'name', 'email']);
        return DataTables::of($users)
            ->addColumn('actions', function ($row) {
                return '<a href="'.route('delete.user', $row->id).'" class="btn btn-danger btn-sm delete-btn">Delete</a>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function deleteUser($data){
        $user = User::find($data);
        $user->delete();
        return true;
    }
}