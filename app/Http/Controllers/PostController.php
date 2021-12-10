<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index ()
    {

        // pemberian title berbeda pada tiap halaman
        $title = '';
        if (request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if(request('author')){
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        return view('posts',[
            "title" => "All Post" . $title,
            "active" => "posts",
            //eager loading pada controller
            //Bila request kosong akan menampilkan posts biasa
            // bila terdapat request maka menampilkan post berdasarkan kata kunci atau category atau bahkan keduanya 
            "posts" => Post::with('category', 'author')->filter(request(['search', 'category', 'author']))->latest()->get()
        ]);
    }

    public function show(Post $post)
    {
        return view('post',[
            "title" => "Single Post",
            "active" => "posts",
            "post" => $post
        ]);
    }
}
