<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginValidateRequest;
use App\Services\UserLoginService;
use Illuminate\Http\Request;
use App\Http\Requests\RegistrationValidateRequest;
use App\services\loginService;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\returnArgument;

class UserLoginController extends Controller
{
    private $loginService;
    public function __construct(){
        $this->loginService = new UserLoginService();
    }
    public function userDashboard(){
        return view('user.dash');
    }
    public function register(){
        return view('user.registration');
    }
    public function registerStore(RegistrationValidateRequest $request){

        $this->loginService->userRegistration($request);
        
        return redirect()->route('user.login', )->with('success', 'Registration Successful');
    }

    public function userLoginValidate(LoginValidateRequest $request){

        if($this->loginService->loginValidate($request->only('email', 'password'))){
            if(Auth::user()->role == USER){
                return redirect()->route('user.profile');
            }else{
                Auth::logout();
                return redirect()->route('user.login');
            }
        }else{
            return redirect()->route('user.login')->with('success', 'Invalid credentials in user page');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('user.login');
    }
}
