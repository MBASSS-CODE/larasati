<?php

namespace App\Models;

class Posts 
{
    // private karena data array ini hanyan boleh di akses oleh class ini saja
    private static $blog_posts = [
        [
            "title" => "Post 1",
            "slug" => "post-satu",
            "body" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi, provident vitae. Commodi voluptatem dolorem repellat distinctio, a porro labore asperiores vel beatae corrupti recusandae minima, facilis laboriosam ad totam earum officiis repudiandae. Amet quod illum, architecto assumenda officiis tempora quidem iusto quae cupiditate voluptatum! Praesentium amet dignissimos delectus doloribus architecto cum eius accusantium, ratione, porro numquam ex libero nulla recusandae sapiente est aperiam explicabo repellendus dolorem tempore ipsam in! Nostrum natus vitae dolores nobis possimus, consectetur, impedit, voluptates alias quasi libero doloribus. Reiciendis totam fuga beatae ipsa, animi accusamus ex repellendus consequuntur odit labore hic atque est earum molestias distinctio?"
        ],
        [
            "title" => "Post 2",
            "slug" => "post-dua",
            "body" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi, provident vitae. Commodi voluptatem dolorem repellat distinctio, a porro labore asperiores vel beatae corrupti recusandae minima, facilis laboriosam ad totam earum officiis repudiandae. Amet quod illum, architecto assumenda officiis tempora quidem iusto quae cupiditate voluptatum!"
        ]
    ];

    public static function all ()
    {
        // karena property statis maka gunakan self. Biasa kalau OOP menggunakan this-> kalau property biasa
      return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = static::all();
    
        return $posts->firstWhere('slug', $slug);

    }
}


