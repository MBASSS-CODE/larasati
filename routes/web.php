<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
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
        "title" => "Home",
        "active" => "home"
    ]);
});
Route::get('/about', function () {
    return view('about',[
        "title" => "About",
        "active" => "about",
        "name" => "Indra Kurniawan",
        "email" => "Mbasss.ind@gmail.com",
        "image" => "Indra_Kurniawan.png"
    ]);
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/post/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', [CategoryController::class, 'index']); 

// Route::get('/author/{author:username}', function (User $author) {
//     return view('posts', [
//         'title' => "Post By $author->name" ,
//         'active' => "posts" ,
//         'posts' => $author->posts->load('category', 'author') //lazy eager load
//     ]);
// });

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest'); // Name merupakan nama dari routes
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function(){
        return view('dashboard.index');
    })->middleware('auth');

Route::get('/dashboard/posts/createSlug', [DashboardPostController::class, 'createSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class);

Route::resource('/dashboard/category', AdminCategoryController::class)->except('show')->middleware('is_admin');