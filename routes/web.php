<?php

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\UserLoginController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index')->name('index');

Route::group(['prefix' => 'account'], function(){

    Route::group(['middleware' => 'guest'], function(){

        Route::view('/login','user.login')->name('user.login');
        Route::post('/login',[UserLoginController::class,'userLoginValidate'])->name('user.login.validate');
        Route::get('/registration',[UserLoginController::class, 'register'])->name('user.registration');
        Route::post('/registration',[UserLoginController::class, 'registerStore']);
    });
    
    Route::group(['middleware' => 'auth'], function(){

        Route::get('/logout',[UserLoginController::class,'logout'])->name('user.logout');
        Route::get('/user_dashboard',[UserLoginController::class,'userDashboard'])->name('user.profile');
    });
});

Route::group(['prefix' => 'admin'], function(){

    Route::group(['middleware' => 'admin.guest'], function(){

        Route::view('/login','login')->name('login');
        Route::post('/login',[AdminLoginController::class,'login_validate'])->name('admin.login.validate');
    });
    
    Route::group(['middleware' => 'admin.auth'], function(){

        Route::get('/admin_dashboard',[AdminLoginController::class,'adminDash'])->name('admin.dash');
        Route::get('/logout',[AdminLoginController::class,'logout'])->name('logout');
    });
});