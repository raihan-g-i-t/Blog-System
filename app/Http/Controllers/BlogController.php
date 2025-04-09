<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogCreateRequest;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BlogController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = Blog::select(['id', 'title', 'image', 'status']);
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
                ->rawColumns(['image', 'actions', 'status'])
                ->make(true);
        }

        return view('admin.blog');
    }
    
    public function create(){        
        $categories = Category::where('status', STATUS_ACTIVE)->get();
        return view('admin.add-blog')->with('categories', $categories);
    }

    public function store(BlogCreateRequest $request){
        $imagePath = $request->file('image')->store('uploads', 'public');
        
        Blog::create([
            'title' => $request->title,
            'status' => $request->status,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'image' => $imagePath
        ]);

        return redirect()->route('blog')->with('success','Blog Added Successful');
    }

    public function edit($id){
        echo $id;
    }
    
    public function delete($id){

        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('blog')->with('success','Blog Deleted Successful');
    }

    public function show(){
        $blog = Blog::all();

        return view('index')->with('blogs', $blog);
    }

    public function blog($id){
        $blogs = Blog::findOrFail($id);
        $all = Blog::all()->except($id);

        return view('blogs', compact('blogs', 'all'));
    }
}
