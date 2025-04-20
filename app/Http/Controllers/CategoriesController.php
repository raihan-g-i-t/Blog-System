<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    private $category;

    public function __construct(){
        $this->category = new CategoryService;
    }
    public function categories(){
        return view('admin.categories');
    }
    public function getData(Request $request){
        if ($request->ajax()){
            return $this->category->adminCategoryList();
        }
    }

    public function addCategory(){
        return view('admin.add-category');
    }

    public function saveCategory(CategoryCreateRequest $request){
        $this->category->saveCategory($request);
        return redirect()->route('categories')->with('success', 'Category added Successful');
    }

    public function editCategory($id){
        $specific = $this->category->findCategory($id);

        $heading = 'Edit Category';
        $button = 'Save';
        $url = 'editCategory.store';

        $data = compact( 'specific', 'heading', 'button', 'url');
        return view('admin.add-category', ['data' => $data]);
    }

    public function editCategoryStore(CategoryCreateRequest $request, $id){
        $this->category->findCategory($id)
                ->update($this->category->prepareCreateData($request));

        return redirect()->route('categories')->with('success', 'Category updated Successful');
    }

    public function deleteCategory($id){
        $this->category->findCategory($id)->delete();

        return redirect()->route('categories')->with('success', 'Category deleted Successful');
    }
}
