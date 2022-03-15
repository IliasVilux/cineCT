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

Route::get('/content/contentSeries', function () {

    $series = DB::table('series')->get();
    
    return view('/content/contentSeries', ['serie' => $series]);
});

Route::get('/content/contentFilms', function () {

    $films = DB::table('films')->get();

    return view('/content/contentFilms', ['film' => $films]);
});

Route::get('/content/contentAnimes', function () {

    $animes = DB::table('animes')->get();

    return view('/content/contentAnimes', ['anime' => $animes]);
});

Route::get('/detail/detailSeries/{id}', [SerieController::class,  'returnSeries']);

Route::get('/detail/detailFilms/{id}', [FilmController::class,  'returnFilms']);

Route::get('/detail/detailAnimes/{id}', [AnimeController::class,  'returnAnimes']);


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

Route::get('/profile/profile', function () {
    return view('/profile/profile');
});

Route::get('/profile/profileImg', function () {
    return view('/profile/profileImg');
});