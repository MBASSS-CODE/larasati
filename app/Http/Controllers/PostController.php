<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index ()
    {
        

        return view('posts',[
            "title" => "All Post",
            "active" => "posts",
            //eager loading pada controller
            //Bila request kosong akan menampilkan posts biasa
            // bila terdapat request maka menampilkan post berdasarkan kata kunci atau category atau bahkan keduanya 
            "posts" => Post::with('category', 'author')->filter(request(['search', 'category']))->latest()->get()
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
