<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Film;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\FavoriteList;
use App\Models\FavouriteLists;

class UserController extends Controller
{

    public function userProfile()
    {
        return view('profile.profile');
    }

    public function userFavoriteList()
    {
        $userIdList = Auth::User()->id;
        $userFavs = FavouriteLists::where('user_id', $userIdList)->get();

        return view('list', compact(['userFavs']));
    }

    public function specificFavoriteList($id){
        $userIdList = Auth::User()->id;
        $lista = FavoriteList::where('user_id', $userIdList)->where('list_id', $id)->get();
        $data['list'] = FavouriteLists::find($id);
        $data['animes'] = array();
        $data['series'] = array();
        $data['films'] = array();

        foreach($lista as $content){
            if($content->anime_id != null){
                $anime = Anime::find($content->anime_id);
                array_push($data['animes'], $anime);
            }
            if($content->serie_id != null){
                $serie = Anime::find($content->serie_id);
                array_push($data['series'], $serie);
            }
            if($content->film_id != null){
                $film = Anime::find($content->film_id);
                array_push($data['films'], $film);
            }
        }

        return view('list_favorite', compact(['data']));
    }

    public function setFavoriteList($id){
        FavouriteLists::where('top_list', 1)->update(['top_list' => 0]);
        $currentFav = FavouriteLists::where('top_list', 1)->get();

        $userIdList = Auth::User()->id;
        FavouriteLists::where('user_id', $userIdList)->where('id', $id)->update(['top_list' => 1]);

        return redirect()->back();
    }
    public function unsetFavoriteList($id){
        $userIdList = Auth::User()->id;
        FavouriteLists::where('top_list', 1)->where('id', $id)->where('user_id', $userIdList)->update(['top_list' => 0]);

        return redirect()->back();
    }

    public function searchContent(Request $request)
    {

        $search = $request->input('search');

        $request->validate([
            'search' => 'string|max:255|required',
        ]);

        $content = array(
            'films' => array(),
            'series' => array(),
            'animes' => array(),
        );

        $films = Film::where('name', 'LIKE', '%' . $search . '%')->get();
        $series = Serie::where('name', 'LIKE', '%' . $search . '%')->get();
        $animes = Anime::where('name', 'LIKE', '%' . $search . '%')->get();

        if (!is_null($search) || !empty($search) || $search != '') {

            if (count($films) != 0 && !empty($films)) {
                foreach ($films as $film) {
                    array_push($content['films'], $film);
                }
            }

            if (count($series) != 0 && !empty($series)) {
                foreach ($series as $serie) {
                    array_push($content['series'], $serie);
                }
            }

            if (count($animes) != 0 && !empty($animes)) {
                foreach ($animes as $anime) {
                    array_push($content['animes'], $anime);
                }
            }
        }

        /*
        $keys = array_keys($content);
        for ($i = 0; $i < count($content); $i++) {
            echo $keys[$i] . "{<br>";
            foreach ($content[$keys[$i]] as $key => $value) {
                //echo $key . " : " . $value . "<br>";
                echo $value->{'poster_path'};
            }
            echo "}<br>";
        }
        */ 

        //var_dump(empty($content['anime']));

        return view('search', ['content' => $content, 'search' => $search]);
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
