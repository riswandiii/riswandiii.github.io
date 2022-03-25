<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    public function login(){
        return view('login.login', [
            "title" => "Login",
            "active" => "login"
        ]);
    }

public function cekLogin(Request $request){
    $cekLogin = $request->validate([
        'email' => ['required', 'email:dns'],
        'password' => ['required']
    ]);

    if (Auth::attempt($cekLogin)) {
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
    }
    
    \RealRashid\SweetAlert\Facades\Alert::error('Email / Password salah!', 'gagal login!');
    return redirect('/login');
   
}



public function logout()
{
    Auth::logout();
 
    request()->session()->invalidate();
 
    request()->session()->regenerateToken();
 
    return redirect('/');
}
}
