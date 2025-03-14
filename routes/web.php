<?php

use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;

Route::get('/',[loginController::class, 'index'])->name('index');

Route::view('/login','login')->name('login');

Route::get('/user_registration',[loginController::class, 'register'])->name('user.registration');
Route::post('/user_registration',[loginController::class, 'register_store']);