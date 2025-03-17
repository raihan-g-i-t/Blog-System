<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\services\loginService;

class loginController extends Controller
{
    private $loginService;
    public function __construct(){
        $this->loginService = new loginService();
    }
    public function index(){
        return view('index');
    }
    public function register(){
        return view('user.registration');
    }
    public function register_store(Request $request){
        $this->loginService->user_registration($request);
        
        return redirect()->route('login', )->with('success', 'Registration Successful');
    }
}
