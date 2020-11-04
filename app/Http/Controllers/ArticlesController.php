<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index(){
        if(request('tag')){
            $articles = Tag::where('name' , request('tag'))->firstOrFail()->articles;            
        } else {
            $articles = Article::latest()->get();
        }
        
        return view('articles.index', ['articles' => $articles]);
    }

    public function show(Article $article){
        //$article = Article::find($id);
        return view('articles.show', ['article' => $article]);
    }

    public function create()
    {        
        $tags = Tag::all();
        return view('articles.create', ['tags' => $tags]);
    }

    public function store()
    {        
        $validatedAttributes = request()->validate([
            "title" => ['required','min:3','max:255'],
            "exerpt" => "required",
            "body" => "required",
            "tags" => "exists:tags,id"
        ]);

        //$article = new Article();
        //$article->title = request('title');
        //$article->exerpt = request('exerpt');
        //$article->body = request('body');

        //Article::create([
        //    'title' => request('title'),
        //    'exerpt' => request('exerpt'),
        //    'body' => request('body')
        //]);

        $article = new Article($validatedAttributes);        
        $article->tags()->attach(request('tags'));
        //$article->save();

        return redirect(route('articles.index'));
    }

    public function edit(Article $article)
    {
        //$article = Article::find($id);        
        return view('articles.edit',compact('article'));
    }

    public function update(Article $article)
    {
        request()->validate([
            "title" => ['required','min:3','max:255'],
            "exerpt" => "required",
            "body" => "required"
        ]);
        
        //$article = Article::find($id);
        $article->title = request('title');
        $article->exerpt = request('exerpt');
        $article->body = request('body');
        $article->save();
        
        return redirect($article->path());
    }

}
