<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash; // Esta línea es la que me ayuda a encriptar

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
                // Contraseña es correcta
                Auth::login($usuario);
                session(['rol' => $usuario->rol]);

                // Imprimir en consola
                error_log('Rol del usuario: ' . $usuario->rol);
                //sleep(10);
                if(session('rol') == 1){return redirect('/usuarios');}
                else{return redirect('/libros');}
                
            } else {
                // Contraseña incorrecta
                return redirect('/login')->withErrors(['mensajeError' => 'Contraseña incorrecta.']);
            }
        } else {
            // Usuario no encontrado
            return redirect('/login')->withErrors(['mensajeError' => 'Usuario no encontrado.']);
        }
    }
}
