<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PopularTopic extends Model
{
    protected $fillable = ['title', 'description', 'icon'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
