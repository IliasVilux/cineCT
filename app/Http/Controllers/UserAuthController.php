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

        $nick = $request->input('nick');
        $email = $request->input('email');
        
        //login con email
        if(isset($email) && !empty($email)){

            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);
            $logInData = $request->only('email', 'password');
            
            if(Auth::attempt($logInData)){
                return redirect()->to('/')
                            ->with('userLogged','Sessión Iniciada');
            }
        }

        //login con nickname
        if(isset($nick) && !empty($nick)){

            $request->validate([
                'nick' => 'required|string',
                'password' => 'required'
            ]);
            $logInData = $request->only('nick', 'password');
            
            if(Auth::attempt($logInData)){
                return redirect()->to('/')
                            ->with('userLogged','Sessión Iniciada');
            }
        }


        return redirect("register")->with('authErrorMsg','Los datos que has introducido no pertenece a ninguna cuenta. Comprueba los datos y vuelve a intentarlo.');
        
    }

    public function userRegister(Request $request)
    {
        $register_name = $request->input('register_name');
        $register_nick = $request->input('register_nick');
        $register_surname = $request->input('register_surname');
        $register_email = $request->input('register_email');
        $register_password = $request->input('register_password');

        $validate = $this->validate($request, [
            'register_name' => 'required|string|max:255',
            'register_surname' => 'required|string|max:255',
            'register_nick' => 'required|string|max:15', //unique:users-> ningun nick se repetirá
            'register_email' => 'required|string|email', //unique:users
            'register_password' => 'required|min:6',
            'register_password_repeat' => 'required|min:6|same:register_password'

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
        Auth::logout();
        
        Session::flush();
  
        return redirect()->to('register');
    }
}
