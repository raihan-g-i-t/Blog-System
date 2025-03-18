<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationValidateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\services\loginService;

class loginController extends Controller
{
    private $loginService;
    public function __construct(){
        $this->loginService = new loginService();
    }
    public function index(){
        return view('index');
    }

    public function login_validate(){
        return view('user.dash');
    }
    public function register(){
        return view('user.registration');
    }
    public function register_store(RegistrationValidateRequest $request){
        $this->loginService->user_registration($request);
        
        return redirect()->route('login', )->with('success', 'Registration Successful');
    }
}
