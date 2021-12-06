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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
