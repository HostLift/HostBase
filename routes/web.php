<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\PopularGuide;
use App\Models\PopularTopic;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $popularTopics = Category::all();
    $popularGuides = \App\Models\Article::with('category')
        ->inRandomOrder()
        ->take(4)
        ->get();

    return view('home', compact('popularTopics', 'popularGuides'));
})->name('home');

/*
|--------------------------------------------------------------------------
| System Routes
|--------------------------------------------------------------------------
*/

Route::view('/install', 'install');

require __DIR__.'/auth.php';

Route::get('/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/{category}/{article}', [ArticleController::class, 'show'])->name('articles.show');
