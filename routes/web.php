<?php

use App\Http\Controllers\SerieController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ModelRelationshipTest;
use App\Http\Controllers\TopController;
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

Route::group(['middleware' => 'authenticate.user'], function () {
    Route::get('/logout', [UserAuthController::class, 'userSignOut'])->name('signout.user'); 
    Route::get('/home', [HomeController::class,  'index'])->name('home');
    //User-Auth Actions
    Route::get('/user/profile', [UserController::class, 'userProfile'])->name('user.profile');
    Route::get('/user/list', [UserController::class, 'userFavoriteList'])->name('user.favorite.list');
    
    //User-Auth Actions
    Route::post('/user/profile', [UserController::class, 'profileUpdate'])->name('user.update');
    
    Route::get('/user/list', [UserController::class, 'userFavoriteList'])->name('user.favorite.list');

    Route::get('/user/profile/change-password', [ChangePasswordController::class, 'index'])->name('change.password');
    Route::post('/user/profile/change-password', [ChangePasswordController::class, 'store'])->name('change.password.post');

    Route::get('/user/profile/delete-account', [UserController::class, 'deleteAccount'])->name('delete.account');

    //Return All Series
    Route::get('/content/contentSeries', [SerieController::class, 'fetchAllSeries'])->name('serie.all-series');

    //Return Filtered Series
    Route::get('/content/series/{genre}', [SerieController::class, 'filterContent'])->name('serie.series-filtered');

    //Return All Films
    Route::get('/content/contentFilms', [FilmController::class, 'fetchAllFilms'])->name('film.all-films');

    //Return Filtered Film
    Route::get('/content/films/{genre}', [FilmController::class,  'filterContent'])->name('film.films-filtered');
    
    //Return All animes
    Route::get('/content/contentAnimes', [AnimeController::class, 'fetchAllAnimes'])->name('anime.all-animes');

    //Return Filtered Animes
    Route::get('/content/animes/{genre}', [AnimeController::class, 'filterContent'])->name('anime.animes-filtered');

    //TopContent
    Route::get('/top', [TopController::class, 'fetchAllTopContent'])->name('top.top-content');
    
    Route::get('/search', function () {
        return view('search');
    });
    
    //Profile Images
    Route::get('user/profile/image', [UserController::class, 'getUserProfileImg'])->name('user.profile-img');
    Route::post('user/profile/image{id}', [UserController::class, 'postUserProfileImg'])->name('user.save-profile-img');

    Route::get('/detail/detailFilms/{id}', [FilmController::class,  'returnFilms'])->name('film.films');
    /* Route::get('/detail/detailFilms/{id}', 'SocialShareButtonsController@ShareWidget'); */

    Route::get('/detail/detailSeries/{id}', [SerieController::class,  'returnSeries'])->name('serie.series');

    Route::get('/detail/detailAnimes/{id}', [AnimeController::class,  'returnAnimes'])->name('anime.animes');

    //Save Reviews
    Route::post('/film/comment/save/{id}', [ReviewController::class, 'postStoreFilmReview'])->name('comment.save.film');
    Route::post('/serie/comment/save/{id}', [ReviewController::class, 'postStoreSerieReview'])->name('comment.save.serie');
    Route::post('/anime/comment/save/{id}', [ReviewController::class, 'postStoreAnimeReview'])->name('comment.save.anime');


    //Add favourites
    Route::get('/detail/detailAnimes/{id}/{flid}/addFav', [AnimeController::class,  'addFavourite'])->name('anime.fav');
    Route::get('/detail/detailSeries/{id}/{flid}/addFav', [SerieController::class,  'addFavourite'])->name('serie.fav');
    Route::get('/detail/detailFilms/{id}/{flid}/addFav', [FilmController::class,  'addFavourite'])->name('film.fav');

    //Route::get('/content/{search?}', [UserController::class, 'searchContent'])->name('search.content'); 
    //Route::get('/content/search', [UserController::class, 'searchContent'])->name('search-content'); 
    Route::get('/content/{search?}', [UserController::class, 'searchContent'])->name('search-content'); 

    Route::get('/detail/detailAnimes/{id}/addNewList', [AnimeController::class,  'addNewList'])->name('anime.newList');

    Route::get('/user/activity', [UserController::class, 'activity'])->name('user.activity');

    //Save LIKE
    Route::post('/like/{review_id}', [LikeController::class, 'like'])->name('user.like');
   
    //Delete LIKE
    Route::post('/dislike/{review_id}', [LikeController::class, 'dislike'])->name('user.dislike');
   
});



Route::get('/aboutUs', function () {
    return view('aboutUs');
});



//Route::get('/testing/models', [ModelRelationshipTest::class, 'tests'])->name('model.testing');