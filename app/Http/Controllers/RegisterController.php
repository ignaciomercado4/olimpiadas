<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255|unique:users,name',
            'email' => 'required|string|email|max:255|unique:users,email',
            'direccion' => 'required|string|max:255|unique:users,direccion',
            'password' => 'required|string|min:8',
        ], [
            'unique' => 'Los datos utilizados ya pertenecen a otro usuario.',
        ]);
    
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
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        ], [
            'email.required' => 'El campo de correo electrónico es obligatorio.',
            'password.required' => 'El campo de contraseña es obligatorio.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
                $request->session()->regenerate();
    
                return redirect(route('homepage'));
            } else {
                // Contraseña incorrecta
                return redirect(route('viewLogin'))
                    ->withErrors(['password' => 'La contraseña proporcionada es incorrecta.']);
            }
        } else {
            // Usuario no encontrado
            return redirect(route('viewLogin'))
                ->withErrors(['email' => 'No hay un usuario registrado con este correo electrónico.']);
        }
    }
    
    public function logout (Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('viewLogin'));
    }   
}
