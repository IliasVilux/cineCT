<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Review;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{

    public function store(Request $request, $id)
    {

        $user = Auth::user();
        $film = Film::find($id);
        $id = $film->id;
        $user_id = $user->id;
        
        $description = $request->input('description');

        $request->validate([
            'description' => 'required|string|max:255'
        ]);

        $comment = new Review();
        $comment->description = $description;
        $comment->user_id = $user_id;
        $comment->film_id = $id;
        
        $comment->save();

        return ['msg' => 'Tu comentario se ha añadido!'];

    }
}
