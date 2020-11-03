<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index(){
        $articles = Article::latest()->get();
        return view('articles.index', ['articles' => $articles]);
    }

    public function show($id){
        $article = Article::find($id);
        return view('articles.show', ['article' => $article]);
    }

    public function create()
    {        
        return view('articles.create');
    }

    public function store()
    {        
        request()->validate([
            "title" => ['required','min:3','max:255'],
            "exerpt" => "required",
            "body" => "required"
        ]);

        $article = new Article();
        $article->title = request('title');
        $article->exerpt = request('exerpt');
        $article->body = request('body');

        $article->save();

        return redirect('/articles');
    }

    public function edit($id)
    {
        $article = Article::find($id);        
        return view('articles.edit',compact('article'));
    }

    public function update($id)
    {
        request()->validate([
            "title" => ['required','min:3','max:255'],
            "exerpt" => "required",
            "body" => "required"
        ]);
        
        $article = Article::find($id);
        $article->title = request('title');
        $article->exerpt = request('exerpt');
        $article->body = request('body');
        $article->save();

        return redirect('/articles/'.$article->id);
    }

}
