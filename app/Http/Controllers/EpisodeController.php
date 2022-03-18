<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $series = $serie::store();

        //$seriesEpisodeLink = array();
        $allSeriesEpisode = array();
        $allSerieId = array();
        $episodes = array();


        
        $contador = 0;
        foreach ($series as $seriesFromApi) {
            
            //echo '<b>'.$seriesFromApi->name.' ID_SERIE: '.$seriesFromApi->original_id.'</b><br>';
            $serieSeasson = $seriesFromApi->{'number_of_seasons'};
            if ($seriesFromApi->{'number_of_episodes'} > 0 && $seriesFromApi->{'number_of_seasons'} > 0) {

                //echo $seriesFromApi->name.'<b> - Total {'number_of_seasons'}:'.$serieSeasson.'</b>';
                for ($i = 1; $i <= $serieSeasson; $i++) {
                    
                    
                    if ($contador >= 10) {
                        break (2);
                    }
                    
                    
                    //echo '------------------<br><br>';

                    $episodeSerieApi = Http::get('https://api.themoviedb.org/3/tv/' . $seriesFromApi->{'id'} . '/season/' . $i . '?api_key=9d981b068284aca44fb7530bdd218c30&language=en-EN');
                    $episodeSerieJson = json_decode($episodeSerieApi);
                    
                    if (!empty($episodeSerieJson->{'episodes'})) {
                        //echo 'Season: '.$i.'<br>';
                        
                        foreach($episodeSerieJson->{'episodes'} as $episodePosition){
                            //echo '<b>Episodi: '.$episodePosition->{'episode_number'}.'</b>: '. $episodePosition->{'name'}.'<br>';
                            
                            
                            if(end($episodePosition->{'id'}) == $seriesFromApi->{'last_episode_to_air'}->{'id'} 
                            && end($episodePosition->{'air_date'}) == $seriesFromApi->{'last_episode_to_air'}->{'air_date'} 
                            && end($episodePosition->{'name'}) == $seriesFromApi->{'last_episode_to_air'}->{'name'})
                            {
                                
                            }
                            

                            if(isset($episodePosition->{'air_date'})){
                                $formatDate = date("d-m-Y", strtotime($episodePosition->{'air_date'}));
                                $episodePosition->{'air_date'} = $formatDate;
                                //echo 'Fecha de emisión: ' . $episodePosition->{'air_date'}.'<br><br>';
                            }
                            
                        }
                        //echo '<p style="border:1px solid red; width:200px;">Total Episodios: '.count($episodeSerieJson->{'episodes'}).'</p><br>';
                        
                        //echo '<br><br>';
                        //array_push($allSeriesEpisode, $episodeSerieJson->{'episodes'});
                        //array_push($allSerieId, $seriesFromApi);
                    }
                    
                    echo '<br><br>------------------------<br><br>';
                    echo $episodePosition->{'name'} .'<br>';
                    echo $seriesFromApi->{'id'} .'<br>';
                    echo rand(30,60) .'<br>';
                    echo $episodePosition->{'overview'} .'<br>';
                    echo $episodePosition->{'air_date'} .'<br>';
                    echo '<br><br>------------------------<br><br>';
                    


                    $contador++;
                }
                //echo '------------------------<br><br>';
            }

/*
            echo '<br><br>-------------fwefwe-----------<br><br>';
            echo $episodePosition->{'name'} .'<br>';
            echo $seriesFromApi->original_id .'<br>';
            echo rand(30,60) .'<br>';
            echo $episodePosition->{'overview'} .'<br>';
            echo $episodePosition->{'air_date'} .'<br>';
            echo '<br><br>------------------------<br><br>';
*/
            
            DB::table('episodes')->insert([
                'title' => $episodePosition->{'name'},
                'anime_id' => null,
                'serie_id' => $seriesFromApi->original_id,
                'duration' => rand(30,60),
                'description' => $episodePosition->{'overview'},
                'aired' => $episodePosition->{'air_date'},
                'created_at' => now(),
                'updated_at' => now()
            ]);

            
        }

        /*
        echo 'Total episodios guardados: '.count($allSeriesEpisode[0]);
        echo '<br>------------------------<br>';
        echo 'Total ID de series guardados: '.count($allSerieId);
        echo '<br>------------------------<br>';
        */

        array_push($episodes, $allSerieId);
        array_push($episodes, $allSeriesEpisode);


        $allSeriesFromDataBase = $episodes[0];
        $allEpisodesFromSeries = $episodes[1];

        $duracionesPromedias = array(30,35,40,45,50,55,60);
        
        

        /*
        foreach ($allEpisodesFromSeries as $episode) {
            foreach ($allSeriesFromDataBase as $series) {
                echo  '<h3>' . $series->{'name'} . ' (id '.$series->{'original_id'}.')</h3>';
                for ($i = 0; $i < count($episode); $i++) {
                    echo '<b>'.$episode[$i]->{'episode_number'} . '</b>: Titulo: ' . $episode[$i]->{'name'};                    

                    //formateamos la fecha en formato dia/mes/año
                    if(isset($episode[$i]->{'air_date'})){
                        $formatDate = date("d-m-Y", strtotime($episode[$i]->{'air_date'}));
                        $episode[$i]->{'air_date'} = $formatDate;
                        echo '<br>Fecha de emisión: ' . $episode[$i]->{'air_date'}.'<br>';
                    }
                    
                    if(!empty($episode[$i]->{'overview'})){
                        echo '<br><b>Description</b>: ' . $episode[$i]->{'overview'}.'<br>';
                    }else{
                        echo '<b>No tiene descripción</b><br>';
                    }
                    
                    echo 'Duración: '.$duracionesPromedias[array_rand($duracionesPromedias)].'<br>';

                    echo '<br><br>';
                }
                echo '<br>---------------------------------------------<br>';
            }
        }
        */


        /*
        foreach($episodes[0] as $serie){
            echo '<b>ID: '.$serie->{'original_id'}.'</b> - '.$serie->{'name'};
            echo '<br>------------<br>';
        }


        
        foreach($episodes[1] as $episode){
            for ($i=0; $i < count($episode); $i++) { 
                echo $episode[$i]->{'episode_number'}.' - '.$episode[$i]->{'name'};
                echo '<br><br>';
                
            }
        }
        echo "<br>------------------------------------------------------------------<br>";
        */

        /*
        echo 'Total datos guardados en el array "episodes" : '.count($episodes[0][0]);
        echo '<br>------------------------<br>';
*/


        //die();




        //return $allSeriesEpisode;

    }


}

