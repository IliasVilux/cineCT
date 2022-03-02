<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Actorcontroller extends Controller
{
    public static function store()
    {


        $film = new FilmController();
        $films = $film::store();

        $dbFilms = Film::get();

        /*
        foreach($dbFilms as $dbFilm){
            echo 'ID:' .$dbFilm->id .'- API ID: '.$dbFilm->original_id .'<br>';
        }

        die();
        */

        $apiLinks = array();
        $allActors = array();

        foreach($films as $film) {
            $actorApi = Http::get('https://api.themoviedb.org/3/movie/' . $film->id . '/credits?api_key=9d981b068284aca44fb7530bdd218c30&language=en-ES');
            array_push($apiLinks, $actorApi);
        };


        foreach ($apiLinks as $link) {
            $actorJson = json_decode($link);
            $actors = $actorJson;
            if (isset($actors->{'id'}) && !empty($actors->{'cast'})) {
                foreach($dbFilms as $dbFilm){
                    if($actors->{'id'} == $dbFilm->original_id){
                        $actors->{'id'} = $dbFilm->id;
                    }
                }
                array_push($allActors, $actors);
            }
        }

        
        
        /*
        $limitActor = 2;
        $totalActores = count($allActors);
        var_dump($totalActores);
        die();
      
        echo 'MOVIE_ID - '.$actor->{'id'}.'<br>';
        for ($i=0; $i <$limitActor ; $i++) { 
        }

        foreach($allActors as $actor){
            echo $actor->{'cast'}[1]->{'name'} .'<br>';
            echo '-----------------------<br>';
            
        }
        */
          
          
        return $allActors; 
    }
}
