<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash; // esta linea es la que me ayuda aencriptar *******<-----

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'id_usuario' => 'required|integer',
            'contrasena' => 'required|string',
        ]);

        $usuario = \App\Models\Usuario::where('id_usuario', $request->id_usuario)->first();

        if ($usuario) {
            // Compruebo las credenciales
            if (Hash::check($request->contrasena, $usuario->contrasena)) {
                // contraseña es correcta
                Auth::login($usuario);
                session(['rol' => $usuario->rol]);

                return redirect('/usuarios');
            } else {
                // Contraseña incorrecta
                return redirect('/login')->withErrors([
                    'contrasena' => 'Contraseña incorrecta.',
                ]);
            }
        } else {
            // Usuario no encontrado
            return redirect('/usuarios');
        }
    }

}

