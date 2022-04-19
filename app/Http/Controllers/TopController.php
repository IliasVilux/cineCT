<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Film;
use App\Models\Serie;
use Illuminate\Http\Request;

class TopController extends Controller
{

    public function fetchAllTopContent()
    {
        $topContent = [];
        $topContent['films'] = $this->topFilms();
        $topContent['series'] = $this->topSeries();
        $topContent['animes'] = $this->topAnimes();

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
}
