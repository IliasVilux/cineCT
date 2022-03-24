<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{

    public function userProfile()
    {
        if(Auth::user()){
            return view('profile.profile');
        }else{
            return redirect()->to('/');
        }
    }

    public function userFavoriteList()
    {
        return view('list');
    }

    public function profileUpdate(Request $request)
    {
        $request->validate([
            'username' =>'required|min:4|string|max:255',
        ]);
        $user =Auth::user();
        $user->nick = $request['username'];
        $user->save();
        return view('profile.profile')->with('message','Profile Updated');
    }
}
