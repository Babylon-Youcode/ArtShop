<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    public function logout(){

        Auth::logout();
        Session::forget('cart');
        return redirect('/home');
    }
}
