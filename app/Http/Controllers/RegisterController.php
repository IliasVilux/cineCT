<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{

    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $register_name = $request->input('register_name');
        $register_nick = $request->input('register_name');
        $register_surname = $request->input('register_surname');
        $register_email = $request->input('register_email');
        $register_password = $request->input('register_password');

        $validate = $this->validate($request, [
            'register_name' => 'string|required',
            'register_surname' => 'string|required',
            'register_nick' => 'required|string', //unique:users-> ningun nick se repetirá
            'register_email' => 'required|string|email', //unique:users
            'register_password' => 'required'
        ]);

        $user = User::create([
            'name' => $register_name,
            'email' => $register_email, 
            'surname' => $register_surname,
            'nick' => $register_nick,
            'password' => $register_password
        ]);

        auth()->login($user);

        return redirect()->to('/');
    }
}
