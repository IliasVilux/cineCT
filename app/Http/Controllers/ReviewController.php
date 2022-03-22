<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function createReview(Request $request, $id)
    {

        $film = Film::find($id);

        $user = Auth::user();
        return view('review.create', ['film' => $film]);

    }
}
