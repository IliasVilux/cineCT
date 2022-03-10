<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EpisodeController extends Controller
{

    public static function store()
    {
        $anime = new AnimeController;
        $animes = $anime::index();


        $id_animes = array();
        $duration_animes = array();
        $apiLinks = array();
        $allEpisodes = array();

        $contID = 0;
        foreach ($animes as $idLink) {
            $episodeApi = Http::get('https://api.jikan.moe/v4/anime/' . $idLink->original_id . '/episodes');
            array_push($apiLinks, $episodeApi);
            array_push($id_animes, $idLink->original_id);
            array_push($duration_animes, $idLink->duration);
            sleep(4);
        }

        foreach ($apiLinks as $link) {
            $episodeJson = json_decode($link);
            if (isset($episodeJson) && !empty($episodeJson->{'data'})) {
                $contEpisodes = count($episodeJson->{'data'});
                for ($cont = 0; $cont <= $contEpisodes; $cont++) {
                    if (!empty($episodeJson->{'data'}[$cont])) {
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

    public static function seriesEpisode()
    {
        $serie = new SerieController;
        $series = $serie::index();

        $seriesEpisodeLink = array();
        $allSeriesEpisode = array();
        $allSerieId = array();
        $episodes = array();

        foreach($series as $DataBaseSerie){
            //echo '<b>'.$DataBaseSerie->name.' <br>ID_SERIE: '.$DataBaseSerie->original_id.'</b><br>';
            $serieSeasson = $DataBaseSerie->seasons;
            if($DataBaseSerie->total_episodes > 0 && $DataBaseSerie->seasons > 0){
                for ($i=1; $i <=$serieSeasson  ; $i++) { 
                   //echo 'Season: (<b>total'.$serieSeasson.'</b>) '.$i.'<br>';
                    //echo '------------------<br><br>';
                    $episodeSerieApi = Http::get('https://api.themoviedb.org/3/tv/'.$DataBaseSerie->original_id.'/season/'.$i.'?api_key=9d981b068284aca44fb7530bdd218c30&language=en-EN');
                    $episodeSerieJson = json_decode($episodeSerieApi);
                    if(!empty($episodeSerieJson->{'episodes'})){
                        /*
                        foreach($episodeSerieJson->{'episodes'} as $episodePosition){
                            //echo '<b>Episodi: '.$episodePosition->{'episode_number'}.'</b>: '. $episodePosition->{'name'}.'<br>';
                        }
                        */
                        array_push($allSeriesEpisode, $episodeSerieJson->{'episodes'});
                        array_push($allSerieId, $DataBaseSerie);
                    }
                    
                }
                //echo '------------------------<br><br>';
            }
        }
        
        array_push($episodes, $allSeriesEpisode);
        array_push($episodes, $allSerieId);

        foreach($episodes as $episode){
            echo $episode[0]->{'episode_number'}.'</b>: '. $episode[0]->{'name'}.'<br>';
            echo $episode[1]->{'name'}.'<br>';
        }
        echo '------------------------<br><br>';



        //return $allSeriesEpisode;

    }

}

