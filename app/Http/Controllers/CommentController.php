<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Models\Comment;
use App\Services\CommentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    protected $comment;

    public function __construct(CommentService $commentService){
        $this->comment = $commentService;
    }
    public function commentStore(CommentStoreRequest $request){
        $this->comment->create($request);

        return redirect()->back()->with('success', 'Comment added successful');
    }

    public function commentList(Request $request){
        if($request->ajax()){
            return $this->comment->adminCommentList();
        }

        return view('admin.comment-list');
    }

    public function statusChange($id){
        $this->comment->statusChange($id);

        return redirect()->back()->with('success', 'Status Changed');
    }
}
