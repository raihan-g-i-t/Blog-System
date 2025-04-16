<?php

namespace App\Services;

use App\Models\Blog;
use Yajra\DataTables\DataTables;

class BlogService{

    public function adminBlogList(){
        $data = Blog::join('categories', 'blogs.category_id', '=', 'categories.id')
                    ->where('categories.status', STATUS_ACTIVE)
                    ->select('blogs.*');       
            return DataTables::of($data)
                ->addColumn('image', function ($row) {
                    return '<img src="'.asset('storage/' . $row->image).'" width="50">';
                })
                ->addColumn('actions', function ($row) {
                    return '<a href="'.route('blog.edit', $row->id).'" class="btn btn-warning btn-sm">Edit</a>
                            <a href="'.route('blog.delete', $row->id).'" class="btn btn-danger btn-sm delete-btn">Delete</a>';
                })
                ->addColumn('status', function ($row) {
                    return $row->status
                        ? 'Active'
                        : 'Inactive';
                })
                ->addColumn('category_id', function ($row) {
                    return $row->category->title;
                })
                ->rawColumns(['image', 'actions', 'status','category_id'])
                ->make(true);
    }

    public function getActiveBlogs(){
        return Blog::where('status', STATUS_ACTIVE)->get();
    }

    public function findBlog($id){
        return Blog::find($id);
    }

    public function latestBlogs(){
        return Blog::orderBy('created_at', 'desc')
                    ->where('status', STATUS_ACTIVE)
                    ->take(LATEST_NUMBER_COUNT)->get();
    }

    public function create($data, $image){
        return [
            'title' => $data->title,
            'status' => $data->status,
            'content' => $data->content,
            'category_id' => $data->category_id,
            'image' => $image
        ];
    }

}