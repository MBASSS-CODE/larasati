<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // guard = tidak boleh di isi manual
    // fillable = boleh di isi manual

    protected $fillable = ['category_id', 'title','slug','body','published_at'];
    // protected $with = ['author', 'category']; // eager loading pada model

    public function scopeFilter ($query, array $filters)
    {
        // menggunakan if
        // if(isset($filters['search']) ? $filters['search'] : false){
        //     return $query->where('title', 'like', '%'. $filters['search']. '%')
        //                  ->orWhere('body', 'like', '%' . $filters['search'] . '%');
        // }  

        // menggunakan when (di jalankan jika first argumen bernialai true, dalam hal ini berati kata kunci)
        // menggunakan null coalising yaitu fitur baru penganti ternary operator dan bisa juga digunakan untuk isset
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return  $query->where(function ($query) use ($search) {
                    $query->where('title', 'like', '%'. $search. '%')
                          ->orWhere('body', 'like', '%' . $search. '%');
            });
        });

        // menggunakan when (di jalankan jika first argumen bernialai true, dalam hal ini berati kategori)
        // search menggunakan kata kunci pada suatu kategori
        $query->when($filters['category'] ?? false, function ($query, $category) {
            return  $query->whereHas('category', function ($query) use ($category) {
                    $query->where('slug', $category);
            });
        });

        // kedua 'when' di atas akan dijalankanb bersama jika user mengguakan pencarian merujuk pada suatu kategori
        
    }

    

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author ()
    {
        return $this->belongsTo(User::class, 'user_id'); //alias
    }
    
}
