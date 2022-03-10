<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\EpisodeController;
use App\Models\Genre;
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
    return view('home');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/content', function () {
    return view('content');
});

Route::get('/detail', function () {
    return view('detail');
});

Route::get('/top', function () {
    return view('top');
});

Route::get('/search', function () {
    return view('search');
});

Route::get('/list', function () {
    return view('list');
});

Route::get('/aboutUs', function () {
    return view('aboutUs');
});

Route::get('/asd1', [CharacterController::class, 'store']);
Route::get('/qwe', [AnimeController::class, 'store']);


Route::get('/asd', [EpisodeController::class, 'store']);
Route::get('/asdaa', [EpisodeController::class, 'seriesEpisode']);
Route::get('/asda', [CharacterController::class, 'store']);
