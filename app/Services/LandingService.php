<?php

namespace App\Services;

use App\Models\Blog;

class LandingService{

    public function getAllBlogs(){
        return Blog::where('status', STATUS_ACTIVE)->get();
    }

    public function latestBlogs(){
        return Blog::orderBy('created_at', 'desc')->where('status', STATUS_ACTIVE)->take(3)->get();
    }

}