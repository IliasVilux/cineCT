<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function create($id)
    {
        $film = Film::find($id);

        return view('review.create', ['film' => $film]);

    }

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

        $review = new Review();
        $review->description = $description;
        $review->user_id = $user_id;
        $review->film_id = $id;
        
        $review->save();
        
        return redirect()->route('film.films', ['id' => $film])->with(['message' => 'Tu review se ha publicado!']);

    }
}
