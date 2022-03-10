<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CharacterController extends Controller
{
    public static function store(){

        
        $anime = new AnimeController();
        $animes = $anime::index();
        
        $contador = 1;
        $apiLinks = array();
        $allCharacters = array();
        //$characterAnimes = array();

        do{
            $chracterApi = Http::get('https://api.jikan.moe/v4/characters/' . $contador .'/anime');
            array_push($apiLinks, $chracterApi);
            $contador++;
            sleep(4);
        }while($contador < 5);
        
        //$characterContador = 0;
        foreach($apiLinks as $link){
            $characterJson = json_decode($link);
            $countCharacter = count($characterJson->{'data'});
            if(isset($characterJson->{'data'}) && count($characterJson->{'data'}) > 0){
                for ($i=0; $i <$countCharacter ; $i++) { 
                    foreach($animes as $anime){
                        if($characterJson->{'data'}[$i]->{'anime'}->{'title'} == $anime->name){
                            array_push($allCharacters, $characterJson);
                            break;
                        }
                    }                    
                }
            }            
        }

        foreach($allCharacters as $character){
            echo $character->{'data'}->{'anime'}->{'title'};
            die();
        }

        //return $allCharacters;
    }
}
