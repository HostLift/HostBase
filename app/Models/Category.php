<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'id', 'description', 'slug'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public static function boot()
    {
        parent::boot();

        // Automatically generate a slug when creating a new category
        static::creating(function ($category) {
            $category->slug = Str::slug($category->name);
        });
    }
}
