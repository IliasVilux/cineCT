<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Film;
use App\Models\Review;
use App\Models\Serie;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{

    public function storeFilmReview(Request $request, $id)
    {

        $user = Auth::user();
        $film = Film::find($id);
        $id = $film->id;
        $user_id = $user->id;
        
        $description = $request->input('description');

        $request->validate([
            'description' => 'required|string|max:255'
        ]);

        //guardamos en la base de datos
        $comment = new Review();
        $comment->description = $description;
        $comment->user_id = $user_id;
        $comment->film_id = $id;
        
        $comment->save();

        return ['msg' => 'Tu comentario se ha añadido!', 'comment' => $comment];

    }

    public function storeSerieReview(Request $request, $id){
        $user = Auth::user();
        $serie = Serie::find($id);
        $id = $serie->id;
        $user_id = $user->id;

        $description = $request->input('description');

        $request->validate([
            'description' => 'required|string|max:255'
        ]);

        $comment = new Review();
        $comment->description = $description;
        $comment->user_id = $user_id;
        $comment->serie_id = $id;
        
        $comment->save();

        return ['msg' => 'Tu comentario se ha añadido!', 'comment' => $comment];

    }

    public function storeAnimeReview(Request $request, $id)
    {
        $user = Auth::user();
        $anime = Anime::find($id);
        $id = $anime->id;
        $user_id = $user->id;

        $description = $request->input('description');

        $request->validate([
            'description' => 'required|string|max:255'
        ]);

        $comment = new Review();
        $comment->description = $description;
        $comment->user_id = $user_id;
        $comment->anime_id = $id;
        
        $comment->save();

        return ['msg' => 'Tu comentario se ha añadido!', 'comment' => $comment];
    }
}