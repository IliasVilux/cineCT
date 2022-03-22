<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function createReview(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;


    }
}
