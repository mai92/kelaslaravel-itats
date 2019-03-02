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

    public function edit($articleId, $commentId)
    {
        $comment = Comment::where('article_id', $articleId)->where('id', $commentId)->first();

        $this->authorize('update', $comment);

        return view('frontend.articles.comments.edit', [
            'comment' => $comment,
        ]);
    }

    public function update(Request $request, $articleId, $commentId)
    {
        $comment = Comment::where('article_id', $articleId)->where('id', $commentId)->first();

        $this->authorize('update', $comment);

        $comment->message = $request->message;
        $comment->save();

        return redirect()->route('frontend.article.comment', $articleId);
    }

    public function destroy()
    {
        $this->authorize('hapu', $comment);
    }
}
