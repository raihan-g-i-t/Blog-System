<?php

namespace App\Http\Controllers;

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
            ->addColumn('action', function ($user) {
                return '
                    <a href="'.route('edit.category', $user->id).'" class="custom-btn-edit">Edit</a>
                    <button class="custom-btn-delete" data-id="'.$user->id.'">Delete</button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
        }
    }

    public function editCategory($id){
        echo $id;
    }
}
