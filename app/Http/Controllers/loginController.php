<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Services\LoginService;

class loginController extends Controller
{
    private $loginService;
    public function __construct(){
        $this->loginService = new LoginService();
    }

    public function index(){
        return view('index');
    }

    public function register(){
        return view('user.registration');
    }

    public function register_store(Request $request){
        
        $this->loginService->user_registration($request);
        // DB::table('users')->insert([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => bcrypt($request->password)

        // ]);
    }
}
