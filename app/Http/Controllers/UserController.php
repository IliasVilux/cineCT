<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    
}
