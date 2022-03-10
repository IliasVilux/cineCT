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
        } while($contador < 30);

        $allCharactersSpecs = array();
        $contAnimeId = 0;
        foreach ($idCharacters as $idCharacter) {
            $specificCharaccterApi = Http::get('https://api.jikan.moe/v4/characters/' . $idCharacter);
            $spacificCharacterJson = json_decode($specificCharaccterApi);
            if(isset($spacificCharacterJson->{'data'}->{'name'})){
                if(isset($spacificCharacterJson->{'data'}->{'nicknames'}) && !empty($spacificCharacterJson->{'data'}->{'nicknames'})){
                    if(isset($spacificCharacterJson->{'data'}->{'about'})){
                        if (isset($spacificCharacterJson->{'data'}->{'nicknames'}) && !empty($spacificCharacterJson->{'data'}->{'nicknames'})){
                            array_push($allCharactersSpecs, $spacificCharacterJson);
                        }
                    }
                }
            }
            $contAnimeId++;
            sleep(4);
        }

        echo "-------------------" . count($idAnimes) . "<br>";
        echo "-------------------" . count($allCharactersSpecs) . "<br>";

        foreach($allCharactersSpecs as $asd){
            echo $asd->{'data'}->{'name'} . "<br>";
        }
        die();

        $datosSeeder = array();
        array_push($datosSeeder, $contAnimeId);
        array_push($datosSeeder, $allCharactersSpecs);
        return $datosSeeder;
    }
}