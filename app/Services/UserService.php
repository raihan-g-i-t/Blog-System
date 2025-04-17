<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class UserService{

    public function loginValidate($data){
        return Auth::attempt($data);
    }
    public function userRegistration($data){
        User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => Hash::make($data->password)
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

    public function editStore($data){
        $user = User::find(Auth::user()->id);

        $user->update([
            'name' => $data->name,
            'email' => $data->email
        ]);
    }

    public function passwordStore($data){
        $user = User::find(Auth::user()->id);
        
        if(Hash::check($data->current, $user->password)){
            $user->update([
                'password' => Hash::make($data->new)
            ]);
            return true;
        }else{
            return false;
        }
    }
}