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
        
        $films = $this->topFilms();
        $series = $this->topSeries();
        $animes = $this->topAnimes();
    

        foreach($films as $film)
        {
            $film->puntuation = str_replace ( ".", "", $film->puntuation);;
        }

        foreach($series as $serie)
        {
            $serie->puntuation = str_replace ( ".", "", $serie->puntuation);;
        }

        foreach($animes as $anime)
        {
            $anime->puntuation = str_replace ( ".", "", $anime->puntuation);;
        }

        return view('top', ['films' => $films, 'series' => $series, 'animes' => $animes]);
    }

    
    public function topFilms() 
    {
        $films = Film::where('puntuation' , '>=', '7.5')->whereNotNull('poster_path')->orderBy('puntuation', 'desc')->get();

        return $films;
    }

    public function topSeries()
    {
        $series = Serie::where('puntuation' , '>=', '7.5')->whereNotNull('poster_path')->orderBy('puntuation', 'desc')->get();

        return $series;
    }

    public function topAnimes()
    {
        $animes = Anime::where('puntuation' , '>=', '7.5')->whereNotNull('poster_path')->orderBy('puntuation', 'desc')->get();

        return $animes;
    }
    

    /*
    public function fetchApiTopContent()
    {
        $contador = 1;
        $allFilms = [];
        
        
        $this->topFilms();

        do{
            $filmApi = Http::get('https://api.themoviedb.org/3/movie/' . $contador . '?api_key=9d981b068284aca44fb7530bdd218c30&language=en-US');
            $filmJson = json_decode($filmApi);
            if (isset($filmJson->{'id'})){
                foreach($this->topFilms() as $film){
                    if($film->original_id == $filmJson->{'id'}){
                        array_push($allFilms, $filmJson);
                    }
                }
            }
            $contador++;
        }while($contador < 10);      

        return $allFilms;

    }
    */
}
