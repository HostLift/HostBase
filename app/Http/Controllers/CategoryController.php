<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
    ];

    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $articles = $category->articles; // Assuming you have defined a 'articles' relationship in your Category model

        return view('categories.show', compact('category', 'articles'));
    }

    // Add other methods as needed
}
