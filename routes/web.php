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
    return view('welcome');
});

// THIS IS WHAT`S ALL ABOUT. Total records = 10, Per page = 10
Route::get('/broken', function () {
    $articles = Article::search('test')
        ->query(function ($query) {
            $query->with('authors');
        })
        ->paginate(10, 'page', 1);

    dump($articles);
});

// this works fine. Total records = 100, Per page = 10
Route::get('/fine', function () {
    $articles = Article::search('test')
        ->paginate(10, 'page', 1);

    dump($articles);
});

// select without scout to see all records in database
Route::get('/all', function () {
    $articles = Article::with('authors')->get();

    dump($articles);
});
