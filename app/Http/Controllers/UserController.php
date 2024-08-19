<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function showUsers() {
        $users = User::all();

        return view('usuarios', compact('users'));
    }

    public function modify(Request $request, $id) {
        $usuarioAModificar = User::findOrFail($id);
        $usuarioAModificar->update(request()->all());

        return redirect(route('gestion-usuarios'));
    }
}
