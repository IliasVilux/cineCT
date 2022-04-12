<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like($review_id)
    {
        $user = Auth::user();
        $isset_like = Like::where('user_id', $user->id)->where('review_id', $review_id)->count();
        
        if($isset_like == 0){
            $like = new Like();
            $like->user_id = $user->id;
            $like->review_id = $review_id;

            $like->save();

            return response()->json(['like' => $like]);
            
        }else{

            return response()->json(['message' => 'Ya has dado like']);
        }
        

    }
    
    /*
    public function dislike($review_id)
    {
        $user = Auth::user();

        $like = Like::where('user_id', $user->id)->where('review_id', $review_id)->first();

        if($like) {

            $like->delete();

            return response()->json([
                'like' => $like,
                'message' => 'Has dado dislike'
            ]);
    
        }else{
            
            return response()->json([
                'message' => 'No puedes dar dislike sin antes dar like',
            ]);

        }
    }
    */
}
