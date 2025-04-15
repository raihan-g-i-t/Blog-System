<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogCreateRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Services\BlogService;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $blog;
    private $category;

    public function __construct(){
        $this->blog = new BlogService;
        $this->category = new CategoryService;
    }
    public function index(Request $request){
        if ($request->ajax()) {
            return $this->blog->adminBlogList();
        }
        return view('admin.blog');
    }
    
    public function create(){        
        $categories = $this->category->activeCategories();
        return view('admin.add-blog')->with('categories', $categories);
    }

    public function store(BlogCreateRequest $request){
        $imagePath = $request->file('image')->store('uploads', 'public');
        Blog::create($this->blog->create($request, $imagePath));

        return redirect()->route('blog')->with('success','Blog Added Successful');
    }

    public function edit($id){

        $blog = $this->blog->findBlog($id);
        $categories = $this->category->activeCategories();
        return view('admin.edit-blog', ['blog' => $blog, 'categories' => $categories]);
        
    }

    public function editStore(Request $request, $id){

        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('uploads', 'public');
        }else{
            $imagePath = $request->oldImage;
        }
        $this->blog->findBlog($id)
                    ->update($this->blog->create($request, $imagePath));

        return redirect()->route('blog')->with('success','Blog Updated Successfull');
    }
    
    public function delete($id){
        $this->blog->findBlog($id)->delete();

        return redirect()->route('blog')->with('success','Blog Deleted Successful');
    }

    public function blog($id){
        $blogs = $this->blog->findBlog($id);
        $all = Blog::where('category_id', $blogs->category_id)->get()->except($id);
        $comments = Comment::where('blog_id', $id)->get();

        return view('specific-blogs', compact('blogs', 'all', 'comments'));
    }

    public function allBlogs(){
        $blog = $this->blog->getActiveBlogs();
        return view('all-blogs', ['blogs' => $blog]);
    }

    public function search(Request $request){
        $query = $request->input('query');

        $blogs = Blog::join('categories', 'blogs.category_id', '=', 'categories.id')
                ->where('blogs.title', 'like', "%$query%")
                ->orWhere('blogs.content', 'like', "%$query%")
                ->orWhere('categories.title', 'like', "%$query%")
                ->get();

        return view('all-blogs', compact('blogs', 'query'));
    }
}
