<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public static function profileImageStore()
    {
        $images = array(
            '/storage/img/profile/13ReasonsWhy.jpg', 
            '/storage/img/profile/AliceInBorderland.jpeg', 
            '/storage/img/profile/BlyManor.jpg', 
            '/storage/img/profile/CasaDePapel.jpeg', 
            '/storage/img/profile/DC.jpg', 
            '/storage/img/profile/Disney.png', 
            '/storage/img/profile/EstaMierdaMeSupera.jpg', 
            '/storage/img/profile/Euphoria.jpeg', 
            '/storage/img/profile/JuegoDeTronos.jpeg', 
            '/storage/img/profile/Lucifer.jpg', 
            '/storage/img/profile/Marvel.jpg', 
            '/storage/img/profile/OITNB.png', 
            '/storage/img/profile/Sabrina.jpg', 
            '/storage/img/profile/Sense8.jpg', 
            '/storage/img/profile/StrangerThings.jpg', 
            '/storage/img/profile/TheUmbrellaAcademy.jpg', 
            '/storage/img/profile/TheWitcher.png', 
            '/storage/img/profile/User.png', 
            '/storage/img/profile/You.jpg'
        );

        
        return $images;

    }
}
