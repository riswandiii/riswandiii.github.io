<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



use App\Models\User;


class RegistrasiController extends Controller
{
    public function registrasi(){
        return view('registrasi.registrasi', [
            "title" => "Sign Up",
            "active" => "registrasi"
        ]);
    }


    public function create(Request $request){
        
       $dataregis = $request->validate([
            "name" => ['required', 'min:5', 'max:255'],
            "username" => ['required', 'min:5', 'max:255', 'unique:users'],
            "email" => ['required', 'email:dns', 'unique:users'],
            "password" => ['required', 'min:5', 'max:255']
        ]);

        $dataregis['password'] = bcrypt($dataregis['password']);

        User::create($dataregis);

        \RealRashid\SweetAlert\Facades\Alert::success('Berhasil Registrasi', 'Silahkan Login!');

        return redirect('/login');

    }



}
