<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{

    public function userProfile()
    {
        return view('profile.profile');
    }

    public function userFavoriteList()
    {
        return view('list');
    }

    public function profileUpdate(Request $request)
    {
        $request->validate([
            'username' =>'required|min:4|string|max:255',
            'language' => 'required',
        ]);
        $user = Auth::user();
        $user->nick = $request['username'];
        $user->lang = $request['language'];

        $user->save();
        return view('profile.profile')->with('message','Profile Updated');
    }
    public function deleteAccount(){
        $user = Auth::user();
        $user->delete();

        Auth::logout();
        return redirect()->to('register')->with('signOut', 'Cuenta eliminada!');
    }
}
