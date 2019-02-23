<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;

class ArticleCommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $comment = new Comment;

        $comment->user_id = auth()->id();
        $comment->article_id = $id;
        $comment->message = $request->message;

        $comment->save();

        return redirect()->back();
    }
}
