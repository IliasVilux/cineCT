<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Anime;
use App\Models\Serie;
use App\Models\Film;
use App\Models\FavoriteList;

class UserController extends Controller
{

    public function userProfile()
    {
        return view('profile.profile');
    }

    public function userFavoriteList()
    {
        $userIdList = Auth::User()->id;
        $userFavs['animes'] = FavoriteList::where('user_id', $userIdList)->whereNotNull('anime_id')->get();
        $userFavs['series'] = FavoriteList::where('user_id', $userIdList)->whereNotNull('serie_id')->get();
        $userFavs['films'] = FavoriteList::where('user_id', $userIdList)->whereNotNull('film_id')->get();
        $arrayAnimes = array();
        $arraySeries = array();
        $arrayFilms = array();

        foreach ($userFavs['animes'] as $anime)
        {
            $animeFind = Anime::where('id', $anime->anime_id)->get();
            array_push($arrayAnimes, $animeFind);
        }
        foreach ($userFavs['series'] as $serie)
        {
            $serieFind = Serie::where('id', $serie->serie_id)->get();
            array_push($arraySeries, $serieFind);
        }
        foreach ($userFavs['films'] as $film)
        {
            $filmFind = Serie::where('id', $film->film_id)->get();
            array_push($arrayFilms, $filmFind);
        }
        
        return view('list', compact(['userFavs', 'arrayAnimes', 'arraySeries', 'arrayFilms']));
    }

    public function profileUpdate(Request $request)
    {
        $request->validate([
            'username' =>'required|min:4|string|max:255',
            'language' => 'required',
        ]);
        $user = Auth::user();
        $user->nick = $request['username'];
        $user->lang = $request['language'];

        $user->save();
        return view('profile.profile')->with('message','Profile Updated');
    }
    public function deleteAccount(){
        $user = Auth::user();
        $user->delete();

        Auth::logout();
        return redirect()->to('register')->with('signOut', 'Cuenta eliminada!');
    }
}
