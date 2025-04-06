<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogCreateRequest;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){

        $categories = Category::get();
        return view('admin.add-blog')->with('categories', $categories);
    }

    public function store(BlogCreateRequest $request){
        $imagePath = $request->file('image')->store('uploads', 'public');
        
        Blog::create([
            'title' => $request->title,
            'status' => $request->status,
            'category_id' => $request->category_id,
            'image' => $imagePath
        ]);
    }
}
