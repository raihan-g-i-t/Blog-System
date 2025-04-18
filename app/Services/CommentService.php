<?php

namespace App\Services;

use App\Models\Comment;
use Yajra\DataTables\DataTables;

class CommentService{

    public function adminCommentList(){
        $data = Comment::select('id', 'status', 'blog_id', 'content');       
            return DataTables::of($data)
                ->addColumn('actions', function ($row) {
                    return '<a href="'.route('comment.status.change', $row->id).'" class="btn btn-warning btn-sm">Change Status</a>';
                })
                ->addColumn('status', function ($row) {
                    return $row->status
                        ? 'Active'
                        : 'Inactive';
                })
                ->addColumn('blog_id', function ($row) {
                    return $row->blog->title;
                })
                ->rawColumns(['actions', 'status','blog_id'])
                ->make(true);
    }

    public function statusChange($data){
        $comment = Comment::where('id', $data)
                    ->first();

        $comment->status == STATUS_ACTIVE ? $status = STATUS_INACTIVE : $status = STATUS_ACTIVE;

        $comment->update([
            'status' => $status
        ]);
    }

    public function activeComments($id){
        return Comment::where('blog_id', $id)
                            ->where('status', STATUS_ACTIVE)
                            ->get();
    }
}