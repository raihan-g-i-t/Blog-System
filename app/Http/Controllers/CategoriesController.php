<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use Yajra\DataTables\DataTables;

class CategoriesController extends Controller
{
    public function categories(){
        return view('admin.categories');
    }
    public function getData(Request $request){
        if ($request->ajax()) {
            $data = Category::select(['id', 'title', 'status']);
            return DataTables::of($data)
            ->addColumn('status', function ($category) {
                return $category->status
                    ? 'Active'
                    : 'Inactive';
            })
            ->addColumn('action', function ($category) {
                return '
                    <a href="'.route('edit.category', $category->id).'" class="custom-btn-edit">Edit</a>
                    <a href="'.route('delete.category', $category->id).'" class="custom-btn-delete">Delete</button>
                ';
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
        }
    }

    public function addCategory(){
        return view('admin.add-category');
    }

    public function saveCategory(CategoryCreateRequest $request){
        
        Category::create([
            'title' => $request->title,
            'status' => $request->status,
        ]);

        return redirect()->route('categories')->with('success', 'Category added Successful');
    }

    public function editCategory($id){
        $category = Category::findOrFail($id);
        
        return view('admin.add-category', 
        ['data' => $category, 'heading' => 'Edit Category', 'button' => 'Save', 'url' => 'editCategory.store']);
    }

    public function editCategoryStore(CategoryCreateRequest $request, $id){

        $category = Category::findOrFail($id);

        $category->update([
            'title' => $request->title,
            'status' => $request->status
        ]);

        return redirect()->route('categories')->with('success', 'Category updated Successful');
    }

    public function deleteCategory($id){

        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories')->with('success', 'Category deleted Successful');
    }
}
