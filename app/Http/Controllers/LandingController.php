<?php

namespace App\Http\Controllers;

use App\Services\BlogService;

class LandingController extends Controller
{
    private $blog;

    public function __construct(){
        $this->blog = new BlogService;
    }
    public function index(){
        $allBlogs = $this->blog->getActiveBlogs();
        $latestBlogs = $this->blog->latestBlogs();

        $data = compact('allBlogs', 'latestBlogs');

        return view('index')->with('data', $data);
    }
}
