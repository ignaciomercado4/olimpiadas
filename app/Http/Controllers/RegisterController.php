<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register(Request $request) {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->direccion = $request->direccion;
        $user->password = Hash::make($request->password);

        $user->save();
    
        Auth::login($user);

        return redirect(route('homepage'));
    }    

    public function login(Request $request) {
        $user = User::where('email', $request->email)->first();
    
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
                $request->session()->regenerate();

                return redirect(route('homepage'));
            } else {

                return redirect(route('viewLogin'));
            }
        } else {

            return redirect(route('viewLogin'));
        }
    }
    
    

    public function logout (Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('viewLogin'));
    }   
}
