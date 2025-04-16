<?php

namespace App\Services;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminService{

    protected $blog;

    public function __construct(BlogService $blogService){
        $this->blog = $blogService;
    }

    public function userLoginValidate(array $data){
        return Auth::guard('admin')->attempt($data);
    }

    public function forDashboard(){
        $totalUsers = User::where('role', USER)
                        ->count();
        $totalBlogs = Blog::count();
        $totalCategory = Category::count();
        $latestUsers = User::where('role', USER)
                        ->latest()->take(LATEST_NUMBER_COUNT)->get();
        $latestBlogs = $this->blog->latestBlogs();

        $data = compact('totalUsers', 'totalBlogs', 'totalCategory', 'latestUsers', 'latestBlogs');
        return $data;
    }
}