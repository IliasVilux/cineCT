<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\SocialShareButtonsController;
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


Route::get('/detail/detailFilms/{id}', [FilmController::class,  'returnFilms']);
/* Route::get('/detail/detailFilms/{id}', 'SocialShareButtonsController@ShareWidget'); */

Route::get('/detail/detailSeries/{id}', [SerieController::class,  'returnSeries']);

Route::get('/detail/detailAnimes/{id}', [AnimeController::class,  'returnAnimes']);


Route::get('/top', function () {
    return view('top');
});

Route::get('/search', function () {
    return view('search');
});

Route::get('/aboutUs', function () {
    return view('aboutUs');
});

Route::get('/profile/profileImg', function () {
    return view('/profile/profileImg');
});


//User-Auth Actions
Route::get('/user/profile', [UserController::class, 'userProfile'])->name('user.profile');
Route::get('/user/list', [UserController::class, 'userFavoriteList'])->name('user.favorite.list');

Route::get('/login', [UserAuthController::class, 'index']);
Route::get('/register', [UserAuthController::class, 'index'])->name('user.create');

Route::post('/register', [UserAuthController::class, 'userRegister'])->name('register.user');
Route::post('/login', [UserAuthController::class, 'userLogin'])->name('login.user');
Route::get('/logout', [UserAuthController::class, 'userSignOut'])->name('signout.user');
