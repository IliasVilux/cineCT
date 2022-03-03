<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EpisodeController extends Controller
{
    
    public static function store(){
        $anime = new AnimeController;
        $animes = $anime::index();


        $id_animes = array();
        $duration_animes = array();
        $apiLinks = array();
        $allEpisodes = array();

        $contID = 0;
        foreach ($animes as $idLink){
            $episodeApi = Http::get('https://api.jikan.moe/v4/anime/' . $idLink->original_id . '/episodes');
            array_push($apiLinks, $episodeApi);
            array_push($id_animes, $idLink->original_id);

            $numRandom = rand(-10, 10);
            $idLink->duration += $numRandom;
            array_push($duration_animes, $idLink->duration);
            sleep(4);
        }
        
        foreach($apiLinks as $link){
            $episodeJson = json_decode($link);
            if (isset($episodeJson) && !empty($episodeJson->{'data'})){
                $contEpisodes = count($episodeJson->{'data'});
                for ($cont=0; $cont<=$contEpisodes; $cont++){
                    if (!empty($episodeJson->{'data'}[$cont])){
                        array_push($allEpisodes, $episodeJson->{'data'}[$cont]);
                    }
                }
            }
        }

        /* $contGlobal = 0;
        foreach($allEpisodes as $ppv){
            echo $ppv->{'title'};
            echo "<br>";
            echo "Pertenece al anime con id: " . $id_animes[$contGlobal];
            echo "<br>";
            echo "Duración del capítulo: " . $duration_animes[$contGlobal] . "mins";
            echo "<br>";
            echo "Fecha de emisión: " . substr($ppv->{'aired'}, 0, 10);
            echo "<br><br>-----------------------------------------------------------------------------<br><br>";
            $contGlobal++;
        } */


        $tresArrays = array();
        array_push($tresArrays, $allEpisodes);
        array_push($tresArrays, $id_animes);
        array_push($tresArrays, $duration_animes);

        return $tresArrays;
    }
    
}
