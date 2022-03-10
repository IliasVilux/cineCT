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
        $series = $serie::fetchAllSeries();

        $allseriesFromApiWithFiltred = new SerieController();
        $seriesWithFilter = $allseriesFromApiWithFiltred::store();

        $allSerieEpisodes = array();

        foreach ($series as $serie) {
            $episodeSerieApi = Http::get('https://api.themoviedb.org/3/tv/' . $serie->original_id . '/season/1?api_key=9d981b068284aca44fb7530bdd218c30&language=en-EN');
            if ($serie->original_id >= 10) {
                break;
            }
            array_push($allSerieEpisodes, $episodeSerieApi);
        }


        foreach ($allSerieEpisodes as $serieEpisode) {
            $episodeJson = json_decode($serieEpisode);
            $serieEpisode = $episodeJson->{'episodes'};
            $episodeCount = count($episodeJson->{'episodes'});
            $last_episode = array_pop($serieEpisode);
            if (isset($episodeJson->{'episodes'}) && $serieEpisode > 0) {
                foreach ($seriesWithFilter as $serieManipulated) {

                    if (isset($serieManipulated->{'last_episode_to_air'})) {

                        if ($serieManipulated->{'last_episode_to_air'}->{'id'} == $last_episode->{'id'} && $serieManipulated->{'last_episode_to_air'}->{'name'} == $last_episode->{'name'}) {

                            foreach ($series as $serie) {
                                echo "Episodios de: " . $serie->name . '<br>';
                                echo "--------------------<br>";

                                for ($i = 0; $i < $episodeCount; $i++) {
                                    echo 'Episodio ' . $episodeJson->{'episodes'}[$i]->{'episode_number'} . ' - ' . $episodeJson->{'episodes'}[$i]->{'name'} . '<br>';
                                }
                                echo "-------------------------------<br>";
                            }
                            //echo $serieManipulated->{'last_episode_to_air'}->{'name'};
                        }
                    }
                }
            }
        }
    }
}
