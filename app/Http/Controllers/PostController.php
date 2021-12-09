<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index ()
    {
        $posts = Post::with(['author', 'category'])->latest();

        if(request('search')) {
            // cari pada judul
            $posts->where('title', 'like', '%' . request('search') . '%')
            // cari pada body/artikel
                  ->orWhere('body', '%' . request('search') . '%');
        }

        return view('posts',[
            "title" => "All Post",
            "active" => "posts",
            "posts" => $posts->get() //eager loading pada controller
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
