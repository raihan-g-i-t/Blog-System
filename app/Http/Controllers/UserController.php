<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginValidateRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Http\Requests\RegistrationValidateRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $userService;
    public function __construct(){
        $this->userService = new UserService();
    }
    public function userDashboard(){
        return view('user.dash');
    }
    public function register(){
        return view('user.registration');
    }
    public function registerStore(RegistrationValidateRequest $request){
        
        $this->userService->userRegistration($request);
        
        return redirect()->route('user.login', )->with('success', 'Registration Successful');
    }

    public function userLoginValidate(LoginValidateRequest $request){

        if($this->userService->loginValidate($request->only('email', 'password'))){
            if(Auth::user()->role == USER){
                return redirect()->route('user.profile');
            }else{
                Auth::logout();
                return redirect()->route('user.login');
            }
        }else{
            return redirect()->route('user.login')->with('success', 'Invalid credentials');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('user.login');
    }

    public function displayUsers(){
        return view('admin.user-list');
    }

    public function userList(){
        return $this->userService->userList();
    }

    public function deleteUser($id){
        $result = $this->userService->deleteUser($id);

        if($result == true){
            return redirect()->back()->with('success', 'User Deleted Successful');
        }else{
            return redirect()->back()->with('success', 'User Deleted unSuccessful');
        }
    }
}
