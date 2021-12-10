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
            "posts" => Post::with('category', 'author')->filter(request(['search']))->latest()->get() //eager loading pada controller
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
