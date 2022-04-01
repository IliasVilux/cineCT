<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Film;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{

    public function userProfile()
    {
        return view('profile.profile');
    }

    public function userFavoriteList()
    {
        return view('list');
    }

    public function searchContent(Request $request)
    {
        $search = $request->input('search');

        $content = array(
            'film' => array(),
            'serie' => array(),
            'anime' => array(),
        );

        $films = Film::where('name', 'LIKE', '%' . $search . '%')->get();
        $series = Serie::where('name', 'LIKE', '%' . $search . '%')->get();
        $animes = Anime::where('name', 'LIKE', '%' . $search . '%')->get();

        if (!is_null($search) && !empty($search) && $search != '') {

            if (count($films) != 0 && !empty($films)) {
                foreach ($films as $film) {
                    array_push($content['film'], $film);
                }
            }

            if (count($series) != 0 && !empty($series)) {
                foreach ($series as $serie) {
                    array_push($content['serie'], $serie);
                }
            }

            if (count($animes) != 0 && !empty($animes)) {
                foreach ($animes as $anime) {
                    array_push($content['anime'], $anime);
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
