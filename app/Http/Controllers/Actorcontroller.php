<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Actorcontroller extends Controller
{
    public static function store(){
        
        $contador = 1;
        $apiLinks = array();
        $allActors = array();
        
        do{
            $actorApi = Http::get('https://api.themoviedb.org/3/person/popular?api_key=9d981b068284aca44fb7530bdd218c30&language=en-US&page='.$contador);
            array_push($apiLinks, $actorApi);
            $contador++;
        }while($contador < 2);

        
        foreach($apiLinks as $link) {
            $actorJson = json_decode($link);
            $actors = $actorJson->{"results"};
            $contadorActores = count($actors);

            if(isset($actors->{"known_for"}[0]->{"name"})){
                echo "i";
                for ($i=0; $i < $contadorActores ; $i++) { 
                }
            }
        }
    
     
        //return $allActors;

    }
}
