<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Comment;

class CommentController extends Controller
{
    public function index()
    {
        return view('admin.comments.index');
    }

    public function show(Comment $comment)
    {
        return view('admin.comments.show', compact('comment'));
    }
}
