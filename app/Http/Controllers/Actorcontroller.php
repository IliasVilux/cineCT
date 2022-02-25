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
            $actorApi = Http::get('https://api.themoviedb.org/3/movie/'. $contador .'/credits?api_key=9d981b068284aca44fb7530bdd218c30&language=en-ES');
            array_push($apiLinks, $actorApi);
            $contador++;
        }while($contador < 20);
    
        
        $limitActor = 3;
        foreach($apiLinks as $link) {
            $actorJson = json_decode($link);
            $actors = $actorJson;
            
            
            if(isset($actors->{'id'})){
                for ($i=0; $i <=$limitActor ; $i++) { 
                    if(isset($actors->{'cast'}[$i]->{'name'}))
                    echo $actors->{'cast'}[$i]->{'name'} . "<br>";
                }

                echo "--------------------------------"."<br><br><br>";
            }
            
        }

    }
}
