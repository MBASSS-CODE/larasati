<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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
    return view('home', [
        "title" => "Home"
    ]);
});
Route::get('/about', function () {
    return view('about',[
        "title" => "About",
        "name" => "Indra Kurniawan",
        "email" => "Mbasss.ind@gmail.com",
        "image" => "Indra_Kurniawan.png"
    ]);
});

Route::get('/posts', [PostController::class, 'index']);

Route::get('/post/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function () {
    return view('categories',[
        'title' => 'Post Categories',
        'categories' => Category::all()
    ]);
}); 

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'title' => "Post in category : $category->name",
        'posts' => $category->posts
    ]);
});

Route::get('/author/{author:username}', function (User $author) {
    return view('posts', [
        'title' => "Post By $author->name" ,
        'posts' => $author->posts->load('category', 'author') //lazy eager load
    ]);
});
