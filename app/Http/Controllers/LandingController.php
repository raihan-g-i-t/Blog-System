<?php

namespace App\Http\Controllers;

use App\Services\LandingService;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    private $blog;

    public function __construct(){
        $this->blog = new LandingService;
    }
    public function index(){
        $allBlogs = $this->blog->getAllBlogs();
        $latestBlogs = $this->blog->latestBlogs();

        $data = compact('allBlogs', 'latestBlogs');

        return view('index')->with('data', $data);
    }
}
