<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialShareButtonsController extends Controller
{
    public function ShareWidget()
    {
        $shareComponent = \Share::page(
            '', // Link que se comparte
            '', // Texto de compartir
        )
        ->facebook()
        ->twitter()
        ->linkedin()
        ->telegram()
        ->whatsapp()
        ->reddit();
        
        return view('posts', compact('shareComponent'));
    }
}
