<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PopularGuide extends Model
{
    protected $fillable = ['title', 'description', 'article_id'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
