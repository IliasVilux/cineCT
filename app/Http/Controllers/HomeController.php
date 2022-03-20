<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    
    public function index()
    {
        $series = DB::table('series')->get();
        $films = DB::table('films')->get();
        $animes = DB::table('animes')->get();

    return view('home', ['serie' => $series, 'film' => $films, 'anime' => $animes]);

    }
}
