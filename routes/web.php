<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
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


Route::get('/', [HomeController::class,  'index'])->name('home');

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

Route::get('/detail/detailFilms/{id}', function () {

    $profile = DB::table('profile_images')->get();
    
    return view('/detail/detailFilms/{id}', ['profile' => $profile]);
});

Route::get('/detail/detailFilms/{id}', [FilmController::class,  'returnFilms']);

Route::get('/detail/detailSeries/{id}', [SerieController::class,  'returnSeries']);

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



//Registro
Route::get('/register', [RegisterController::class,  'create'])->name('register.create');
Route::post('/register', [RegisterController::class,  'store'])->name('register.store');

Route::get('/logout', [SessionController::class,  'destroy'])->name('user.logout');

/*
Route::get('/login', [SessionController::class,  'create'])->name('user.login-create');
Route::post('/login', [SessionController::class,  'store'])->name('user.login');
*/

