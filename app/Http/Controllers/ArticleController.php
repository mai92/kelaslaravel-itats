<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::paginate(5);

        return view('articles.index',[
            'title' => 'List Article',
            'articles' => $articles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:6',
            'content' => 'required|min:6'
        ]);

        $article = new Article;

        $article->user_id = auth()->id();
        $article->title = $request->title;
        $article->image = $request->file('image')->store('articles');
        $article->content = $request->content;

        $article->save();

        return redirect()->route('article.index')->with('warning', 'Data disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        // dd($article);
        return view('articles.edit', [
            'title' => 'Edit Article ' . $id,
            'article' => $article,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:6',
            'content' => 'required|min:6'
        ]);

        $article = Article::find($id);

        $image = $article->image; // set nilai default variabel $image sesuai path yang ada di database

        if ($request->hasFile('image')) { // check apakah request mengandung file "image"
            if (Storage::exists($article->image)) { // check apakah didalam asset / project terdapat file image sesuai path dari database
                Storage::delete($article->image); // Hapus gambar lama sesuai artikel
            }

            $image = $request->file('image')->store('articles');
        }

        $article->user_id = auth()->id();
        $article->title = $request->title;
        $article->image = $image;
        $article->content = $request->content;

        $article->save();

        return redirect()->route('article.index')->with('info', 'Data diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);

        if (Storage::exists($article->image)) {
            Storage::delete($article->image);
        }

        $article->delete();

        return redirect()->back()->with('danger', 'Data dihapus');
    }
}
