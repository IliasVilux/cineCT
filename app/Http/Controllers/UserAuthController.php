<?php

namespace App\Http\Controllers;

use App\Models\User;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function userLogin(Request $request)
    {
        
        $request->validate([
            'email' => 'string|required',
            'password' => 'required'
        ]);
        
        $logInData = $request->only('email', 'password');
        
        if(Auth::attempt($logInData)){
            return redirect()->to('/')
                        ->with('userLogged','Sessión Iniciada');
        }

        return redirect("register")->with('msgError','El email o la contraseña no son correctos, vuelve a intentarlo');
        
    }

    public function userRegister(Request $request)
    {
        $register_name = $request->input('register_name');
        $register_nick = $request->input('register_nick');
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


    public function userSignOut()
    {
        Session::flush();
        Auth::logout();
  
        return redirect()->to('register');
    }
}
