<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function showRegister() {
        
        return view('register');
    }

    public function showLogin() {
        
        return view('login');
    }

    public function showHome() {
        
        return view('home');
    }

}
