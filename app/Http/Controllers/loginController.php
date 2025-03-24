<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginValidateRequest;
use App\Http\Requests\RegistrationValidateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\services\loginService;

class loginController extends Controller
{
    private $loginService;
    public function __construct(){
        $this->loginService = new loginService;
    }
    public function index(){
        return view('index');
    }

    public function login_validate(LoginValidateRequest $request){
        
        if($this->loginService->userLoginValidate($request->only('email', 'password', 'remember'))){
            if(Auth::user()->role == USER){
                return redirect()->route('user.profile');
            }else{
                return redirect()->route('admin.dash');
            }
        }else{
            return redirect()->route('login')->with('success', 'Invalid credentials');
        }
    }

    public function user_dashboard(){
        return view('user.dash');
    }
    public function register(){
        return view('user.registration');
    }
    public function register_store(RegistrationValidateRequest $request){

        $this->loginService->user_registration($request);
        
        return redirect()->route('login', )->with('success', 'Registration Successful');
    }

    public function logout(){
        Auth::logout();
        
        return redirect()->route('index');
    }

    public function admin_dash(){
        return view('admin.dash');
    }
}
