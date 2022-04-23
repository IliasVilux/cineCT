<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Film;
use App\Models\Serie;

class TopController extends Controller
{

    public $ratingMinim = '7.5';

    public function fetchAllTopContent()
    {
        
        $films = $this->topFilms();
        $series = $this->topSeries();
        $animes = $this->topAnimes();

        return view('top', ['films' => $films, 'series' => $series, 'animes' => $animes]);
    }

    
    public function topFilms() 
    {
        $films = Film::where('puntuation' , '>=', $this->ratingMinim)->whereNotNull('poster_path')->orderBy('puntuation', 'desc')->get();

        return $films;
    }

    public function topSeries()
    {
        $series = Serie::where('puntuation' , '>=', $this->ratingMinim)->whereNotNull('poster_path')->orderBy('puntuation', 'desc')->get();

        return $series;
    }

    public function topAnimes()
    {
        $animes = Anime::where('puntuation' , '>=',  $this->ratingMinim)->whereNotNull('poster_path')->orderBy('puntuation', 'desc')->get();

        return $animes;
    }

}
