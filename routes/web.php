<?php

use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;

Route::get('/',[loginController::class, 'index'])->name('index');

Route::view('/login','login')->name('login');

Route::middleware('login-middleware')->group(function(){
    Route::post('/login',[loginController::class,'login_validate'])->name('login.validate');
});


Route::get('/user_registration',[loginController::class, 'register'])->name('user.registration');
Route::post('/user_registration',[loginController::class, 'register_store']);