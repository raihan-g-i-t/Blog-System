<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'index');
Route::view('/login','login')->name('login');
Route::view('/user_registration','user.registration')->name('user.registration');


