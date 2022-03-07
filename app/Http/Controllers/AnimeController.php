<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;
use Illuminate\Support\Facades\Http;

class AnimeController extends Controller
{
    public static function store(){
        $contador = 1;
        $apiLinks = array();
        $allAnimes = array();

        do{
            $animeApi = Http::get('https://api.jikan.moe/v4/anime/' . $contador);
            array_push($apiLinks, $animeApi);
            $contador++;
        }while($contador < 20);
        
        /* function setInterval($f, $milliseconds) {
            $seconds=(int)$milliseconds/1000;
            while(true)
            {
                $f();
                sleep($seconds);
            }
        }
        setInterval(function(){
            foreach ($apiLinks as $asd){
                echo $asd;
            }
        } ,1000);
        die(); */

        foreach($apiLinks as $link) {
            $animeJson = json_decode($link);
            if (isset($animeJson->{'data'}->{'mal_id'}) && $animeJson->{'data'}->{'type'} == 'TV'){
                if (!empty($animeJson->{'data'}->{'genres'}) || !empty($animeJson->{'data'}->{'themes'})){
                    $themeName = $animeJson->{'data'}->{'themes'}[0]->{'name'};
                    $genreName = $animeJson->{'data'}->{'genres'}[0]->{'name'};
                    if($themeName == "Sci-Fi"){
                        $animeJson->{'data'}->{'themes'}[0]->{'name'} = 9;                
                    } else if($themeName == "War") {
                        $animeJson->{'data'}->{'themes'}[0]->{'name'} = 22;
                    }else if($themeName == "Science fiction"){
                        $animeJson->{'data'}->{'themes'}[0]->{'name'} = 21;
                    }else if($themeName == "Family"){
                        $animeJson->{'data'}->{'themes'}[0]->{'name'} = 20;                
                    }else if($themeName == "Crime"){
                        $animeJson->{'data'}->{'themes'}[0]->{'name'} = 19;  
                    }else if($themeName == "Animation"){
                        $animeJson->{'data'}->{'themes'}[0]->{'name'} = 18;                
                    }else if($themeName == "Shounen"){
                        $animeJson->{'data'}->{'themes'}[0]->{'name'} = 17;                
                    }else if($themeName == "Shoujo"){
                        $animeJson->{'data'}->{'themes'}[0]->{'name'} = 16;                
                    }else if($themeName == "Seinen"){
                        $animeJson->{'data'}->{'themes'}[0]->{'name'} = 15;                
                    }else if($themeName == "Josei"){
                        $animeJson->{'data'}->{'themes'}[0]->{'name'} = 14;                
                    }else if($themeName == "Samurai"){
                        $animeJson->{'data'}->{'themes'}[0]->{'name'} = 13;                
                    }else if($themeName == "Mecha"){
                        $animeJson->{'data'}->{'themes'}[0]->{'name'} = 12;                
                    }else if($themeName == "Demons"){
                        $animeJson->{'data'}->{'themes'}[0]->{'name'} = 11;                
                    }else if($themeName == "Suspense"){
                        $animeJson->{'data'}->{'genres'}[0]->{'name'} = 10;                
                    }else if($themeName == "Romance"){
                        $animeJson->{'data'}->{'genres'}[0]->{'name'} = 8;                
                    }else if($themeName == "Mystery"){
                        $animeJson->{'data'}->{'genres'}[0]->{'name'} = 7;                
                    }else if($themeName == "Horror"){
                        $animeJson->{'data'}->{'genres'}[0]->{'name'} = 6;                
                    }else if($themeName == "Fantasy"){
                        $animeJson->{'data'}->{'genres'}[0]->{'name'} = 5;                
                    }else if($themeName == "Drama"){
                        $animeJson->{'data'}->{'genres'}[0]->{'name'} = 4;                
                    }else if($themeName == "Comedy"){
                        $animeJson->{'data'}->{'genres'}[0]->{'name'} = 3;                
                    }else if($themeName == "Adventure"){
                        $animeJson->{'data'}->{'genres'}[0]->{'name'} = 2;                
                    }else if($themeName == "Action"){
                        $animeJson->{'data'}->{'genres'}[0]->{'name'} = 1;
                    }else{
                        $animeJson->{'data'}->{'genres'}[0]->{'name'} = 23;
                    }
                    array_push($allAnimes, $animeJson);
                }
            }
        }
        foreach ($allAnimes as $asd){
                echo "<img src='" . $animeJson->{'data'}->{'images'}->{'webp'}->{'large_image_url'} . "'>";
        }
        die();

        return $allAnimes;
    }

    public function returnAnimes($id) {
        $animes = Anime::find($id);
        if (!is_null($animes)) {
            return view('detailAnimes', ['anime' => $animes]);
        } else {
            return response('No encontrado', 404);
        }

        /*foreach($animes as $anime) {
            echo $anime;
        }

        return view('detail', ['anime' => $animes]);*/
    }
}
