<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Actorcontroller extends Controller
{
    public static function filmActors()
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
            $actorApi = Http::get('https://api.themoviedb.org/3/movie/' . $film->id . '/credits?api_key=9d981b068284aca44fb7530bdd218c30&language=en-EN');
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

    public static function serieActors() 
    {
        $serie = new SerieController();
        $series = $serie::store();

        $apiLinks = array();
        $allActors = array();

        $dbSeries = Serie::get();

        foreach($series as $serie) {
            $actorApi = Http::get('https://api.themoviedb.org/3/tv/'.$serie->id.'/credits?api_key=9d981b068284aca44fb7530bdd218c30&language=en-EN');
            array_push($apiLinks, $actorApi);
        };

        foreach ($apiLinks as $link) {
            $actorJson = json_decode($link);
            $actors = $actorJson;
            if (isset($actors->{'id'}) && !empty($actors->{'cast'})) {
                foreach($dbSeries as $dbSerie){
                    if($actors->{'id'} == $dbSerie->original_id){
                        $actors->{'id'} = $dbSerie->id;
                    }
                }
                array_push($allActors, $actors);
            }
        }

        /*
        foreach($allActors as $serieActor) {
            if(count($serieActor->{'cast'}) > 2){
                for ($i=0; $i <2 ; $i++) { 
                    echo $serieActor->{'id'} . ' - ' . $serieActor->{'cast'}[$i]->{'name'} .'<br>';   
                }
            }else{
                echo $serieActor->{'id'} . ' - ' . $serieActor->{'cast'}[0]->{'name'} .'<br>';
            }
        }
        */

        return $allActors;

    }
}
