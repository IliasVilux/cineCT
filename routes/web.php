<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\AnimeController;
use App\Models\Genre;
use App\Models\Serie;
use App\Models\Films;
use App\Models\Anime;
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

/*Route::get('/', function () {
    return view('register');
});*/

Route::get('/', function () {

    $series = DB::table('series')->get();
    $films = DB::table('films')->get();
    $animes = DB::table('animes')->get();

    return view('home', ['serie' => $series, 'film' => $films, 'anime' => $animes]);
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/content', function () {
    return view('content');
});

/*Route::get('/detail/{id}/{name}', function($id, $name){

    $series = DB::table('series')->get();
    $films = DB::table('films')->get();
    $animes = DB::table('animes')->get();


    if($series->id === $id && $series->name === $name) {
        Route::get('/detail/{id}/{name}', [SerieController::class,  'returnSeries']);
    } else if($films) {
        Route::get('/detail/{id}/{name}', [FilmController::class,  'returnFilms']);
    } else {
        Route::get('/detail/{id}/{name}', [AnimeController::class,  'returnAnimes']);
    }
});*/

Route::get('/detail/{id}', [SerieController::class,  'returnSeries', FilmController::class,  'returnFilms', AnimeController::class,  'returnAnimes']);

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
