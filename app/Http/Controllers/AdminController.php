<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginValidateRequest;
use App\Http\Requests\RegistrationValidateRequest;
use App\Http\Requests\PasswordEditRequest;
use App\Http\Requests\UserEditStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Services\AdminService;
use Yajra\DataTables\DataTables;
use App\Models\User;

class AdminController extends Controller
{
    private $admin;
    public function __construct(AdminService $adminService){
        $this->admin = $adminService;
    }

    public function login_validate(LoginValidateRequest $request){
        
        if($this->admin->userLoginValidate($request->only('email', 'password'))){
            if(Auth::guard('admin')->user()->role == ADMIN){
                return redirect()->route('admin.dash');
            }else{
                Auth::guard('admin')->logout();
                return redirect()->route('index');
            }
        }else{
            return redirect()->route('login')->with('success', 'Invalid credentials');
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        
        return redirect()->route('index');
    }

    public function adminDash(){
        $data = $this->admin->forDashboard();
        return view('admin.dashboard', ['data' => $data]);
    }

    public function editInfoStore(UserEditStoreRequest $request){
        $this->admin->editStore($request);

        return redirect()->route('admin.settings')->with('success', 'Update Successful');
    }

    public function editPasswordStore(PasswordEditRequest $request){
        $result = $this->admin->passwordStore($request);
        if($result == true){
            return redirect()->route('admin.settings')->with('success', 'Update Successful');
        }else{
            return redirect()->back()->with('success', 'Current Password is Wrong');
        }
    }

}
