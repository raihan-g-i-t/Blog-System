<?php

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoriesController;
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

        Route::group(['prefix' => 'category'], function(){

            Route::get('/',[CategoriesController::class,'categories'])->name('categories');
            Route::get('/data',[CategoriesController::class,'getData'])->name('categories.data');
            Route::get('/edit/{id}',[CategoriesController::class,'editCategory'])->name('edit.category');
            Route::post('/edit/{id}',[CategoriesController::class,'editCategoryStore'])->name('editCategory.store');
            Route::get('/add',[CategoriesController::class,'addCategory'])->name('add.category');
            Route::post('/add',[CategoriesController::class,'saveCategory'])->name('save.category');
            Route::get('/delete/{id}',[CategoriesController::class,'deleteCategory'])->name('delete.category');
        });

        Route::group(['prefix' => 'blog'],function(){
            Route::get('/',[BlogController::class, 'index'])->name('blog');
            Route::post('/',[BlogController::class, 'store'])->name('blog.store');
        });
        
        Route::get('/admin_dashboard',[AdminLoginController::class,'adminDash'])->name('admin.dash');
        Route::get('/logout',[AdminLoginController::class,'logout'])->name('logout');
    });
});