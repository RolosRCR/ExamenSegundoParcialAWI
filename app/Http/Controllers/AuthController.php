<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash; // Agregar esta línea para importar Hash


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

    // Obtener el usuario de la base de datos manualmente para verificar si existe
    $usuario = \App\Models\Usuario::where('id_usuario', $request->id_usuario)->first();

    if ($usuario) {

        // Comprobar si la contraseña coincide
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
        return redirect('/login')->withErrors([
            'id_usuario' => 'Usuario no encontrado.',
        ]);
    }
}

}


  /* public function login(Request $request)
    {
        // Imprimir las credenciales para depuración
        // dd($request->all());

        // Validar los datos de entrada
        $request->validate([
            'id_usuario' => 'required|integer',
            'contrasena' => 'required|string',
        ]);

        // Intentar autenticar al usuario usando el ID de usuario y la contraseña
        if (Auth::attempt(['id_usuario' => $request->id_usuario, 'contrasena' => $request->contrasena])) {
            // Obtener el usuario autenticado
            $usuario = Auth::user();

            // Guardar el rol del usuario en la sesión
            session(['rol' => $usuario->rol]);

            // Redirigir a la página de usuarios
            return redirect('/usuarios');
        } else {
            // Redirigir de vuelta al login si las credenciales son incorrectas
            return redirect('/login')->withErrors([
                'id_usuario' => 'Error en las credenciales.',
            ]);
        }
    }
        */