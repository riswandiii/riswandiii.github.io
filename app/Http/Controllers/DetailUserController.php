<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DetailUserController extends Controller
{
    public function detail(User $user){
        return view('dashboard.user.detail', [
            'title' => 'Detail ' . auth()->user()->username,
            'user' => $user,
            'active' => 'detail'
        ]);
    }
}
