<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function index()
    {
        if(!Auth::user()){
            return view ('register');
        }else{
            $series = DB::table('series')->get();
            $films = DB::table('films')->get();
            $animes = DB::table('animes')->get();
    
            //dd(Session::all());
    
            return view('home', ['serie' => $series, 'film' => $films, 'anime' => $animes]);
        }
    }
}
