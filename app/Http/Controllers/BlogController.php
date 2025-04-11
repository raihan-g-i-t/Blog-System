<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogCreateRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Services\LandingService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BlogController extends Controller
{

    private $landing;

    public function __construct(){
        $this->landing = new LandingService;
    }
    public function index(Request $request){
        if ($request->ajax()) {
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

        $blog = Blog::find($id);
        $categories = Category::where('status', STATUS_ACTIVE)->get();
        return view('admin.edit-blog', ['blog' => $blog, 'categories' => $categories]);
        
    }

    public function editStore(Request $request, $id){

        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('uploads', 'public');
        }else{
            $imagePath = $request->oldImage;
        }

        $blog = Blog::find($id);
        $blog->update([
            'title'=> $request->title,
            'status' => $request->status,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'image' => $imagePath
        ]);

        return redirect()->route('blog')->with('success','Blog Updated Successfull');
    }
    
    public function delete($id){

        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('blog')->with('success','Blog Deleted Successful');
    }

    public function blog($id){
        $blogs = Blog::findOrFail($id);
        $all = Blog::where('category_id', $blogs->category_id)->get()->except($id);

        return view('blogs', compact('blogs', 'all'));
    }
}
