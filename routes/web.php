<?php

use App\Http\Controllers\SerieController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ModelRelationshipTest;
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

    Route::get('/profile/profileImg', function () {
        return view('/profile/profileImg');
    });
    
    //User-Auth Actions
    Route::post('/user/profile', [UserController::class, 'profileUpdate'])->name('user.update');
    
    Route::get('/user/list', [UserController::class, 'userFavoriteList'])->name('user.favorite.list');

    Route::get('/user/profile/change-password', [ChangePasswordController::class, 'index'])->name('change.password');
    Route::post('/user/profile/change-password', [ChangePasswordController::class, 'store'])->name('change.password.post');

    Route::get('/user/profile/delete-account', [UserController::class, 'deleteAccount'])->name('delete.account');

    //Return All Series
    Route::get('/content/contentSeries', function () {

        $series = DB::table('series')->paginate(100);
 
        return view('/content/contentSeries', ['series' => $series]);
    });
    
    //Return All Films
    Route::get('/content/contentFilms', function () {

        $films = DB::table('films')->paginate(100);
 
        return view('/content/contentFilms', ['films' => $films]);
    })->name('film.all-films');

    //Filter Film
    Route::get('/content/contentFilms/{genre}', [FilmController::class,  'filterContent'])->name('film.all-films-filter');
    
    //Return All animes
    Route::get('/content/contentAnimes', function () {
    
        $animes = DB::table('animes')->paginate(10);
        $allAnimes = DB::table('animes')->get();
 
        return view('/content/contentAnimes', ['animes' => $animes, 'allAnimes' => $allAnimes]);
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
    Route::post('/film/comment/save/{id}', [ReviewController::class, 'postStoreFilmReview'])->name('comment.save.film');
    Route::post('/serie/comment/save/{id}', [ReviewController::class, 'postStoreSerieReview'])->name('comment.save.serie');
    Route::post('/anime/comment/save/{id}', [ReviewController::class, 'postStoreAnimeReview'])->name('comment.save.anime');


    //Add favourites
    Route::get('/detail/detailAnimes/{id}/addFav', [AnimeController::class,  'addFavourite'])->name('anime.fav');
    Route::get('/detail/detailSeries/{id}/addFav', [SerieController::class,  'addFavourite'])->name('serie.fav');
    Route::get('/detail/detailFilms/{id}/addFav', [FilmController::class,  'addFavourite'])->name('film.fav');

    Route::get('/detail/detailAnimes/{id}/addNewList', [AnimeController::class,  'addNewList'])->name('anime.newList');
   
});



Route::get('/aboutUs', function () {
    return view('aboutUs');
});



Route::get('/testing/models', [ModelRelationshipTest::class, 'tests'])->name('model.testing');