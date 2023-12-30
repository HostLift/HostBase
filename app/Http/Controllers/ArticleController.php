<?php

namespace App\Http\Controllers;


use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function show($categorySlug, $articleSlug)
    {
        $category = Category::where('slug', $categorySlug)->firstOrFail();
        $article = Article::where('slug', $articleSlug)->firstOrFail();

        return view('articles.show', compact('category', 'article'));
    }

    // Add other methods as needed (e.g., create, store, edit, update, destroy)
}
