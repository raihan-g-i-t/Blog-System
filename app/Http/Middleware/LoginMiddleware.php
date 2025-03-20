<?php

namespace App\Http\Middleware;

use App\Http\Requests\LoginValidateRequest;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginMiddleware
{
    // /**
    //  * Handle an incoming request.
    //  *
    //  * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
    //  */
    public function handle(LoginValidateRequest $request, Closure $next): Response
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            if(Auth::user()->role == 1){
                return $next($request);
            }else{
                return redirect()->route('admin.dash');
            }
        }else{
            return redirect()->route('login')->with('success', 'Invalid credentials');
        }
    }
}
