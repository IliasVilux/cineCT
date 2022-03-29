<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Film;
use App\Models\Serie;
use Illuminate\Http\Request;


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

        $filmsContent = array();
      
        if($search){
            $films = Film::where('name', 'LIKE', '%'.$search.'%')->get();
            $series = Serie::where('name', 'LIKE', '%'.$search.'%')->get();
            $animes = Anime::where('name', 'LIKE', '%'.$search.'%')->get();
        }
        
        if(count($films) != 0 && !empty($films)){
            foreach($films as $film){
                array_push($content, $film);
            }
        }

        if(count($series) != 0 && !empty($series)){
            foreach($series as $serie){
                array_push($content, $serie);
            }
        }

        if(count($animes) != 0 && !empty($animes)){
            foreach($animes as $anime){
                array_push($content, $anime);
            }
        }

        return view ('search', ['content' => $content, 'search' => $search]);

    }
    
}
