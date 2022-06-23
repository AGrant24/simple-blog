<?php

use App\Models\Article;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    $articles = Article::take(5)->latest()->get();
    return view('articles.index', compact('articles'));
})->name('home');

Route::resource('articles', \App\Http\Controllers\ArticleController::class)->names([
    'home' => 'articles.index'
]);

Route::view('/about', 'about')->name('about');

Route::get('/post', function () {
    return view('post');
})->name('post');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
