<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CharacterController extends Controller
{
    public static function store(){
        $anime = new AnimeController;
        $animes = $anime::index();

        $contador = 1;
        $apiLinks = array();
        $allCharacters = array();
        $idCharacters = array();
        $idAnimes = array();

        do{
            $chracterApi = Http::get('https://api.jikan.moe/v4/characters/' . $contador . '/anime');
            /* array_push($apiLinks, $chracterApi); */
            sleep(4);
            $characterJson = json_decode($chracterApi);
            if (isset($characterJson->{'data'}) && !empty($characterJson->{'data'})){
                foreach ($characterJson->{'data'} as $key) {
                    $find = false;
                    $title = $key->{'anime'}->{'title'};
                    foreach ($animes as $anime) {
                        if($title == $anime->name){
                            if (!$find){
                                /* array_push($allCharacters, $key); */
                                array_push($idAnimes, $anime->original_id);
                                array_push($idCharacters, $contador);
                                $find = true;
                            }
                        }
                    }
                }
            }
            $contador++;
        } while($contador < 100);

        $contAnimeId = 0;
        foreach ($idCharacters as $idCharacter) {
            $specificCharaccterApi = Http::get('https://api.jikan.moe/v4/characters/' . $idCharacter);
            $spacificCharacterJson = json_decode($specificCharaccterApi);
            if(isset($spacificCharacterJson->{'data'}->{'name'})){
                echo $spacificCharacterJson->{'data'}->{'name'} . "<br>";
            }
            if(isset($spacificCharacterJson->{'data'}->{'nicknames'}) && !empty($spacificCharacterJson->{'data'}->{'nicknames'})){
                echo $spacificCharacterJson->{'data'}->{'nicknames'}[0] . "<br>";
            }
            if(isset($spacificCharacterJson->{'data'}->{'about'})){
                echo $spacificCharacterJson->{'data'}->{'about'} . "<br>";
            }
            echo $idAnimes[$contAnimeId];
            $contAnimeId++;
            echo "<br><br>";
            /* if (isset($characterJson->{'data'}) && !empty($characterJson->{'data'})){
                if (isset($characterJson->{'data'}->{'images'}->{'webp'}) && !empty($characterJson->{'data'}->{'images'}->{'webp'})){
                    echo "<img src=" . $characterJson->{'data'}->{'images'}->{'webp'}->{'image_url'} . ">";
                }
            } */
            sleep(4);
        }
        die();

        /* foreach($apiLinks as $link){
            $characterJson = json_decode($link);
            if (isset($characterJson->{'data'}) && !empty($characterJson->{'data'})){
                foreach ($characterJson->{'data'} as $key) {
                    $find = false;
                    $title = $key->{'anime'}->{'title'};
                    foreach ($animes as $anime) {
                        if($title == $anime->name){
                            if (!$find){
                                array_push($allCharacters, $key);
                                $find = true;
                            }
                        }
                    }
                }
            }
        } */

        /* foreach ($allCharacters as $asd) {
            echo $asd->{'anime'}->{'title'} . "<br>";
        } */
        die;
        return $allCharacters;
    }
}
