<?php

use App\Http\Controllers\SerieController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserController;
use App\Models\Genre;
use App\Models\Serie;
use App\Models\Films;
use App\Models\Anime;
use Illuminate\Support\Facades\DB;
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

Route::get('/', [UserAuthController::class, 'index'])->name('user.login.register');
Route::get('/login', [UserAuthController::class, 'index']);
Route::get('/register', [UserAuthController::class, 'index'])->name('user.create');
Route::post('/register', [UserAuthController::class, 'userRegister'])->name('register.user');
Route::post('/login', [UserAuthController::class, 'userLogin'])->name('login.user');
Route::get('/logout', [UserAuthController::class, 'userSignOut'])->name('signout.user'); 

Route::group(['middleware' => 'authenticate.user'], function () {
    Route::get('/home', [HomeController::class,  'index'])->name('home');
    //User-Auth Actions
    Route::get('/user/profile', [UserController::class, 'userProfile'])->name('user.profile');
    Route::get('/user/list', [UserController::class, 'userFavoriteList'])->name('user.favorite.list');

    //Return All Series
    Route::get('/content/contentSeries', function () {

        $series = DB::table('series')->get();
        
        return view('/content/contentSeries', ['serie' => $series]);
    });
    
    //Return All Films
    Route::get('/content/contentFilms', function () {
    
        $films = DB::table('films')->get();
    
        return view('/content/contentFilms', ['film' => $films]);
    });
    
    //Return All animes
    Route::get('/content/contentAnimes', function () {
    
        $animes = DB::table('animes')->get();
    
        return view('/content/contentAnimes', ['anime' => $animes]);
    });

    Route::get('/top', function () {
        return view('top');
    });
    
    Route::get('/search', function () {
        return view('search');
    });
    
    Route::get('/profile/profileImg', function () {
        return view('/profile/profileImg');
    });
    

    Route::get('/detail/detailFilms/{id}', [FilmController::class,  'returnFilms'])->name('film.films');
    /* Route::get('/detail/detailFilms/{id}', 'SocialShareButtonsController@ShareWidget'); */

    Route::get('/detail/detailSeries/{id}', [SerieController::class,  'returnSeries'])->name('serie.series');

    Route::get('/detail/detailAnimes/{id}', [AnimeController::class,  'returnAnimes'])->name('anime.animes');

    //Save Reviews
    Route::post('/film/comment/save/{id}', [ReviewController::class, 'postStoreFilmReview'])->name('comment.save');
    Route::post('/serie/comment/save/{id}', [ReviewController::class, 'postStoreSerieReview'])->name('comment.save.serie');
    Route::post('/anime/comment/save/{id}', [ReviewController::class, 'postStoreAnimeReview'])->name('comment.save.anime');

   Route::get('/content/{search?}', [UserController::class, 'searchContent'])->name('search.content'); 
   
});



Route::get('/aboutUs', function () {
    return view('aboutUs');
});



