<?php

namespace App\Services;

use Yajra\DataTables\DataTables;
use App\Models\Category;

class CategoryService{

    public function adminCategoryList(){
        $data = Category::select(['id', 'title', 'status']);
            return DataTables::of($data)
            ->addColumn('status', function ($category) {
                return $category->status
                    ? 'Active'
                    : 'Inactive';
            })
            ->addColumn('action', function ($category) {
                return '
                    <a href="'.route('edit.category', $category->id).'" class="btn btn-warning btn-sm">Edit</a>
                    <a href="'.route('delete.category', $category->id).'" class="btn btn-danger btn-sm delete-btn">Delete</button>
                ';
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }

    public function findCategory($id){
        return Category::find($id);
    }

    public function getAllCategory(){
        return Category::all();
    }

    public function activeCategories(){
        return $this->getAllCategory()->where('status', STATUS_ACTIVE);
    }

    public function prepareCreateData($data){
        return [
            'title' => $data->title,
            'status' => $data->status
        ];
    }

    public function saveCategory($data){
        Category::create($this->prepareCreateData($data));
    }
}