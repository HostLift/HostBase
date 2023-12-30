<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Testing\Fluent\Concerns\Has;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content', 'category_id', 'user_id', 'slug'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function boot()
    {
        parent::boot();

        // Automatically generate a slug when creating a new article
        static::creating(function ($article) {
            $article->slug = Str::slug($article->title);
        });
    }
}
