<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProjectController;
use \App\Http\Controllers\PostsController;
use \App\Http\Controllers\ArticlesController;
use \App\Models\Article;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('projects', ProjectController::class);
Route::get('/posts/{post}', [PostsController::class,'show']);

Route::get('/contact', function(){
    return view('contact');
});

Route::get('/about', function(){    
    return view('about', [
        'articles' => Article::latest()->get()
    ]);
});


Route::get('/articles', [ArticlesController::class,'index']);
Route::post('/articles', [ArticlesController::class,'store']);
Route::get('/articles/create', [ArticlesController::class,'create']);
Route::get('/articles/{article}', [ArticlesController::class,'show']);
Route::get('/articles/{article}/edit', [ArticlesController::class,'edit']);
Route::put('/articles/{article}', [ArticlesController::class,'update']);

