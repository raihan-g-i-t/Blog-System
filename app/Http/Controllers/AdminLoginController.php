<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginValidateRequest;
use App\Http\Requests\RegistrationValidateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\services\loginService;

class AdminLoginController extends Controller
{
    private $loginService;
    public function __construct(){
        $this->loginService = new loginService;
    }

    public function login_validate(LoginValidateRequest $request){
        
        if($this->loginService->userLoginValidate($request->only('email', 'password'))){
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
        return view('admin.dashboard');
    }
}
