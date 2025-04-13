<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function commentStore(CommentStoreRequest $request){

        Comment::create([
            'content' => $request->content,
            'blog_id' => $request->blog_id,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->back()->with('success', 'Comment added successful');
    }
}
