<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{ Article, Comment };

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(5);

        return view('frontend.articles.index', [
            'articles' => $articles,
        ]);
    }

    public function show($id)
    {
        $article = Article::find($id);

        return view('frontend.articles.show', [
            'article' => $article,
            'comments' => $article->comments()->latest()->get(),
        ]);
    }
}
