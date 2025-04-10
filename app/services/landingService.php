<?php

namespace App\services;

use App\Models\Blog;

class landingService{

    public function getAllBlogs(){
        return Blog::all();
    }

    public function latestBlogs(){
        return Blog::orderBy('created_at', 'desc')->take(3)->get();
    }

}