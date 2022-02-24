<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            sleep(4);
        }while($contador < 20);

        foreach($apiLinks as $link) {
            $animeJson = json_decode($link);
            if (isset($animeJson->{'data'}->{'mal_id'}) && $animeJson->{'data'}->{'type'} == 'TV'){
                $animeJson->{'data'}->{'duration'} = substr($animeJson->{'data'}->{'duration'}, 0, 2);
                if (!empty($animeJson->{'data'}->{'themes'})){
                    $themeName = $animeJson->{'data'}->{'themes'}[0]->{'name'};
                    switch ($themeName){
                        case "Sci-Fi": $animeJson->{'data'}->{'themes'}[0]->{'name'} = 9; break;
                        case "Demons": $animeJson->{'data'}->{'themes'}[0]->{'name'} = 11; break;
                        case "Mecha": $animeJson->{'data'}->{'themes'}[0]->{'name'} = 12; break;
                        case "Samurai": $animeJson->{'data'}->{'themes'}[0]->{'name'} = 13; break;
                        case "Josei": $animeJson->{'data'}->{'themes'}[0]->{'name'} = 14; break;
                        case "Seinen": $animeJson->{'data'}->{'themes'}[0]->{'name'} = 15; break;
                        case "Shoujo": $animeJson->{'data'}->{'themes'}[0]->{'name'} = 16; break;
                        case "Shounen": $animeJson->{'data'}->{'themes'}[0]->{'name'} = 17; break;
                        default: $animeJson->{'data'}->{'themes'}[0]->{'name'} = 23; break;
                    }
                    array_push($allAnimes, $animeJson);
                } else if (!empty($animeJson->{'data'}->{'genres'})){
                    $genreName = $animeJson->{'data'}->{'genres'}[0]->{'name'};
                    switch ($genreName){
                        case "Action": $animeJson->{'data'}->{'genres'}[0]->{'name'} = 1; break;
                        case "Adventure": $animeJson->{'data'}->{'genres'}[0]->{'name'} = 2; break;
                        case "Comedy": $animeJson->{'data'}->{'genres'}[0]->{'name'} = 3; break;
                        case "Drama": $animeJson->{'data'}->{'genres'}[0]->{'name'} = 4; break;
                        case "Fantasy": $animeJson->{'data'}->{'genres'}[0]->{'name'} = 5; break;
                        case "Horror": $animeJson->{'data'}->{'genres'}[0]->{'name'} = 6; break;
                        case "Mystery": $animeJson->{'data'}->{'genres'}[0]->{'name'} = 7; break;
                        case "Romance": $animeJson->{'data'}->{'genres'}[0]->{'name'} = 8; break;
                        case "Suspense": $animeJson->{'data'}->{'genres'}[0]->{'name'} = 10; break;
                        case "Animation": $animeJson->{'data'}->{'genres'}[0]->{'name'} = 18; break;
                        case "Crime": $animeJson->{'data'}->{'genres'}[0]->{'name'} = 19; break;
                        case "Family": $animeJson->{'data'}->{'genres'}[0]->{'name'} = 20; break;
                        case "Science Fiction": $animeJson->{'data'}->{'genres'}[0]->{'name'} = 21; break;
                        case "War": $animeJson->{'data'}->{'genres'}[0]->{'name'} = 22; break;
                        default: $animeJson->{'data'}->{'themes'}[0]->{'name'} = 23; break;
                    }
                    array_push($allAnimes, $animeJson);
                }
            }
        }

        /* foreach ($allAnimes as $asd){
            if (isset($asd->{'data'}->{'themes'}[0]->{'name'})){
                echo $asd->{'data'}->{'themes'}[0]->{'name'};
            } else if (isset($asd->{'data'}->{'genres'}[0]->{'name'})){
                echo $asd->{'data'}->{'genres'}[0]->{'name'};
            }
        }
        die(); */
        /* foreach ($allAnimes as $asd){
                echo $asd->{'data'}->{'images'}->{'webp'}->{'large_image_url'};
                echo $asd->{'data'}->{'title'} . "<br>";
                echo $asd->{'data'}->{'duration'} . "<br>";
                echo $asd->{'data'}->{'synopsis'} . "<br>";
                echo $asd->{'data'}->{'themes'}[0]->{'name'} . "<br>";
                echo $asd->{'data'}->{'year'} . "<br>";
                echo $asd->{'data'}->{'score'} . "<br>";
        } */

        return $allAnimes;
    }
}
