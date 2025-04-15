<?php

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class,'index'])->name('index');

Route::group(['prefix' => 'account'], function(){

    Route::group(['middleware' => 'guest'], function(){

        Route::view('/login','user.login')->name('user.login');
        Route::post('/login',[UserController::class,'userLoginValidate'])->name('user.login.validate');
        Route::get('/registration',[UserController::class, 'register'])->name('user.registration');
        Route::post('/registration',[UserController::class, 'registerStore']);
        Route::get('/blogs/{id}',[BlogController::class, 'blog'])->name('show.blog');
        Route::get('/all/blogs',[BlogController::class, 'allBlogs'])->name('all.blogs');
        Route::get('/search',[BlogController::class, 'search'])->name('search');
    });
    
    Route::group(['middleware' => 'auth'], function(){
        
        Route::post('/comment', [CommentController::class, 'commentStore'])->name('comment.store');
        Route::get('/logout',[UserController::class,'logout'])->name('user.logout');
        Route::get('/dashboard',[UserController::class,'userDashboard'])->name('user.profile');
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
            Route::get('/add',[BlogController::class, 'create'])->name('blog.create');
            Route::post('/add',[BlogController::class, 'store'])->name('blog.store');
            Route::get('/edit/{id}',[BlogController::class, 'edit'])->name('blog.edit');
            Route::post('/edit/{id}',[BlogController::class, 'editStore'])->name('edit.store');
            Route::get('/delete/{id}',[BlogController::class, 'delete'])->name('blog.delete');
        });
        
        Route::get('/admin_dashboard',[AdminLoginController::class,'adminDash'])->name('admin.dash');
        Route::get('/admin/user',[UserController::class,'userList'])->name('user.list');
        Route::get('/admin/users',[UserController::class,'displayUsers'])->name('display.users');
        Route::get('/admin/user/delete/{id}',[UserController::class,'deleteUser'])->name('delete.user');
        Route::get('/logout',[AdminLoginController::class,'logout'])->name('logout');
    });
});