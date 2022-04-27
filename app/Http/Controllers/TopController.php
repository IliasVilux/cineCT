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
        $content = $this->fetchMixTopContent();

        return view('top', [
            'films' => $films,
            'series' => $series,
            'animes' => $animes,
            'contents' => $content
        ]);
    }


    public function topFilms()
    {
        $films = Film::where('puntuation', '>=', $this->ratingMinim)
            ->whereNotNull('poster_path')
            ->orderBy('puntuation', 'desc')
            ->get();
    
        return $films;
    }

    public function topSeries()
    {
        $series = Serie::where('puntuation', '>=', $this->ratingMinim)
            ->whereNotNull('poster_path')
            ->orderBy('puntuation', 'desc')
            ->get();

        return $series;
    }

    public function topAnimes()
    {
        $animes = Anime::where('puntuation', '>=',  $this->ratingMinim)
            ->whereNotNull('poster_path')
            ->orderBy('puntuation', 'desc')
            ->get();

        return $animes;
    }

    public function fetchMixTopContent()
    {
        $films = $this->topFilms();
        $series = $this->topSeries();
        $animes = $this->topAnimes();

        $randomContent = [];
        
        foreach($films as $film)
        {
            array_push($randomContent, $film);
        }

        foreach($series as $serie)
        {
            array_push($randomContent, $serie);
        }

        foreach($animes as $anime)
        {
            array_push($randomContent, $anime);
        }

        shuffle($randomContent);
        
        return $randomContent;
        
    }
}
