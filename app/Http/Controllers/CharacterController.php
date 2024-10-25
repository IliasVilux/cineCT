<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Anime;
use Illuminate\Support\Facades\Http;

class CharacterController extends Controller
{
    public function store(){
        $contador = 1;
        $allCharacters = array();

        $client = new Client();
        do{
            try {
                $response = $client->request('GET', 'https://api.jikan.moe/v4/characters/' . $contador . '/full');
                $responseCharacter = json_decode($response->getBody())->{'data'};
            
                $responseCharacter->{'nicknames'} = isset($responseCharacter->{'nicknames'}) && !empty($responseCharacter->{'nicknames'}) 
                    ? $responseCharacter->{'nicknames'}[0] 
                    : null;
            
                $animeId = isset($responseCharacter->{'anime'}) && !empty($responseCharacter->{'anime'}) 
                    ? $responseCharacter->{'anime'}[0]->{'anime'}->{'mal_id'} 
                    : null;
            
                $responseCharacter->{'anime'} = $animeId && Anime::where('id', $animeId)->exists() 
                    ? $animeId 
                    : null;
            
                $allCharacters[] = $responseCharacter;
            
                if ($contador % 3 == 0) {
                    sleep(1);
                }
            } catch (\GuzzleHttp\Exception\ClientException $e) {
            }
            $contador++;
        } while($contador < 500);

        return $allCharacters;
    }
}
