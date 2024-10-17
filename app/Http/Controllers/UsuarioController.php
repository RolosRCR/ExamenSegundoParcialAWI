<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario; 
use Illuminate\Support\Facades\Hash; 

class UsuarioController extends Controller
{
    public function index()
    {
        return view('usuarios'); 
    }

    public function guardar(Request $request)
    {
        // Valida
        $request->validate([
            'clave' => 'nullable|integer|max:255', 
            'nombre' => 'required|string|max:255',
            'contrasena' => 'required|string|min:4', 
            'rol' => 'required|integer',
        ]);

        //nuevos usuarioa
        Usuario::create([
            'clave' => $request->id_usuario, 
            'nombre' => $request->nombre,
            'rol' => $request->rol,
            'contrasena' => Hash::make($request->contrasena), // Encripta la contraseña
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario agregado correctamente.');
    }
}
