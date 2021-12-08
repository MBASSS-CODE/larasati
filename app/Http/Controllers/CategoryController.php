<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index ()
    {   
        return view('categories',[
            'title' => 'Post Categories',
            'categories' => Category::all()
        ]);
    }

    public function  categories(Category $category)
    {
        return view('posts', [
            'title' => "Post in category : $category->name",
            'posts' => $category->posts->load('category', 'author') //lazy eager load
        ]);
    }
}
