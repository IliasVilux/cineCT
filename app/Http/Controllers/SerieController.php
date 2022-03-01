<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SerieController extends Controller
{
    public static function store(){
        
        $contador = 1;
        $apiLinks = array();
        $allSeries = array();

        do{
            $serieApi = Http::get('https://api.themoviedb.org/3/tv/' .$contador. '?api_key=9d981b068284aca44fb7530bdd218c30&language=en-EN');
            array_push($apiLinks, $serieApi);
            $contador++;
        }while($contador < 20);
        
        foreach($apiLinks as $link) {
            $serieJson = json_decode($link);
            if (!empty($serieJson->{'genres'})){
                $genreName = $serieJson->{'genres'}[0]->{'name'};
                if($genreName == "Action") {
                    $serieJson->{'genres'}[0]->{'name'} = 1;
                }else if($genreName == "Adventure"){
                    $serieJson->{'genres'}[0]->{'name'} = 2;
                }else if($genreName == "Comedy"){
                    $serieJson->{'genres'}[0]->{'name'} = 3;                
                }else if($genreName == "Drama"){
                    $serieJson->{'genres'}[0]->{'name'} = 4;  
                }else if($genreName == "Fantasy"){
                    $serieJson->{'genres'}[0]->{'name'} = 5;                
                }else if($genreName == "Horror"){
                    $serieJson->{'genres'}[0]->{'name'} = 6;                
                }else if($genreName == "Mystery"){
                    $serieJson->{'genres'}[0]->{'name'} = 7;                
                }else if($genreName == "Romance"){
                    $serieJson->{'genres'}[0]->{'name'} = 8;                
                }else if($genreName == "Sci-Fi"){
                    $serieJson->{'genres'}[0]->{'name'} = 9;                
                }else if($genreName == "Suspense"){
                    $serieJson->{'genres'}[0]->{'name'} = 10;                
                }else if($genreName == "Demons"){
                    $serieJson->{'genres'}[0]->{'name'} = 11;                
                }else if($genreName == "Mecha"){
                    $serieJson->{'genres'}[0]->{'name'} = 12;                
                }else if($genreName == "Samurai"){
                    $serieJson->{'genres'}[0]->{'name'} = 13;                
                }else if($genreName == "Josei"){
                    $serieJson->{'genres'}[0]->{'name'} = 14;                
                }else if($genreName == "Seinen"){
                    $serieJson->{'genres'}[0]->{'name'} = 15;                
                }else if($genreName == "Shoujo"){
                    $serieJson->{'genres'}[0]->{'name'} = 16;                
                }else if($genreName == "Shounen"){
                    $serieJson->{'genres'}[0]->{'name'} = 17;                
                }else if($genreName == "Animation"){
                    $serieJson->{'genres'}[0]->{'name'} = 18;                
                }else if($genreName == "Crime"){
                    $serieJson->{'genres'}[0]->{'name'} = 19;                
                }else if($genreName == "Family"){
                    $serieJson->{'genres'}[0]->{'name'} = 20;                
                }else if($genreName == "Science Fiction"){
                    $serieJson->{'genres'}[0]->{'name'} = 21;                
                }else if($genreName == "War"){
                    $serieJson->{'genres'}[0]->{'name'} = 22;
                }else{
                    $serieJson->{'genres'}[0]->{'name'} = 23;
                }
                array_push($allSeries, $serieJson);
            }
        }

        return $allSeries;

    }

    public function fetchAllSeries(){

        $series = Serie::get();

       return view('', ['series' => $series]);
    }
}
