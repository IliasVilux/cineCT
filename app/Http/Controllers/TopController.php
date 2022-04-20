<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Film;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TopController extends Controller
{

    public function fetchAllTopContent()
    {
        $topContent = [];
        $topContent['films'] = $this->topFilms();
        $topContent['series'] = $this->topSeries();
        $topContent['animes'] = $this->topAnimes();
        $films = $this->fetchApiTopContent();

        foreach($films as $film){
            echo $film->{'title'} .' - '. $film->{'popularity'}.'<br>';
        }

        /*
        foreach($topContent['films'] as $film)
        {
            echo $film->original_id .'<br>';
        }

        echo '<br>----------------</br>';

        foreach($topContent['series'] as $serie)
        {
            echo $serie->original_id .'<br>';
        }

        echo '<br>----------------</br>';

        foreach($topContent['animes'] as $anime)
        {
            echo $anime->original_id .'<br>';
        }
        
        echo '<br>----------------</br>';
        */
        return view('top');
    }

    public function topFilms() 
    {
        $films = Film::all();

        return $films;
    }

    public function topSeries()
    {
        $series = Serie::all();

        return $series;
    }

    public function topAnimes()
    {
        $animes = Anime::all();

        return $animes;
    }

    public function filterTopContent(array $data)
    {
        $finalTopContent = [];

    }

    public function fetchApiTopContent()
    {
        $contador = 1;
        $apiLinks = array();
        $allFilms = array();

        do{
            $filmApi = Http::get('https://api.themoviedb.org/3/movie/' . $contador . '?api_key=9d981b068284aca44fb7530bdd218c30&language=en-US');
            array_push($apiLinks, $filmApi);
            $contador++;
        }while($contador < 500);

        foreach($apiLinks as $link){
            $filmJson = json_decode($link);
            if (isset($filmJson->{'id'}) && strlen($filmJson->{'popularity'}) >= 6){
                array_push($allFilms, $filmJson);
            }
        }

        return $allFilms;

    }
}
