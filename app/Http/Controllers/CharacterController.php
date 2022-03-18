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
                    $title = $key->{'anime'}->{'title'};
                    foreach ($animes as $anime) {
                        if($title === $anime->name){
                            /* array_push($allCharacters, $key); */
                            array_push($idAnimes, $anime->original_id);
                            array_push($idCharacters, $contador);
                            break(2);
                        }
                    }
                }
            }
            $contador++;
        } while($contador < 75);

        $allCharactersSpecs = array();
        $contAnimeId = 0;
        $idAnimesFinal = array();
        foreach ($idCharacters as $idCharacter) {
            $specificCharaccterApi = Http::get('https://api.jikan.moe/v4/characters/' . $idCharacter);
            $spacificCharacterJson = json_decode($specificCharaccterApi);
            if(isset($spacificCharacterJson->{'data'}) && isset($spacificCharacterJson->{'data'}->{'name'}) && !empty($spacificCharacterJson->{'data'}->{'name'})){
                array_push($allCharactersSpecs, $spacificCharacterJson);
                array_push($idAnimesFinal, $idAnimes[$contAnimeId]);
            }
            $contAnimeId++;
            sleep(4);
        }

        /* echo "-------------------" . count($idAnimesFinal) . "<br>";
        echo "-------------------" . count($allCharactersSpecs) . "<br>";

        foreach ($idAnimesFinal as $key) {
            echo $key . "<br>";
        }

        $asd = 0;
        foreach($allCharactersSpecs as $asd){
            echo $asd->{'data'}->{'name'} . "<br>";
            $asd++;
        } */

        $datosSeeder = array();
        array_push($datosSeeder, $idAnimesFinal);
        array_push($datosSeeder, $allCharactersSpecs);
        return $datosSeeder;
    }
}