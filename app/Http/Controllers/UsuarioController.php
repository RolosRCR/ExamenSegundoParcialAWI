<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario; // Asegúrate de tener el modelo correcto
use Illuminate\Support\Facades\Hash; // Asegúrate de importar el Hash

class UsuarioController extends Controller
{
    public function index()
    {
        return view('usuarios'); 
    }

    public function guardar(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'clave' => 'nullable|integer|max:255', // Clave opcional como entero
            'nombre' => 'required|string|max:255',
            'contrasena' => 'required|string|min:6', // Contraseña mínima de 6 caracteres
            'rol' => 'required|integer',
        ]);

        // Crear el nuevo usuario
        Usuario::create([
            'clave' => $request->id_usuario, 
            'nombre' => $request->nombre,
            'rol' => $request->rol,
            'contrasena' => Hash::make($request->contrasena), // Encripta la contraseña
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario agregado correctamente.');
    }
}
