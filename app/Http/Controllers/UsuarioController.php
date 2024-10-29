<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
{
    // Obtener todos los usuarios
    $usuarios = Usuario::all();
    
    // Obtener todos los beneficiarios
    //$beneficiarios = Beneficiario::all();
    
    // Pasar ambos conjuntos de datos a la vista
    return view('usuarios', compact('usuarios'));
}


    public function guardar(Request $request)
    {
        // Valida los datos de entrada
        $request->validate([
            'clave' => 'nullable|integer|max:255',
            'nombre' => 'required|string|max:255',
            'contrasena' => 'required|string|min:4',
            'rol' => 'required|integer',
        ]);

        // Crear nuevo usuario
        Usuario::create([
            'clave' => $request->id_usuario, // Cambié $request->id_usuario por $request->clave
            'nombre' => $request->nombre,
            'rol' => $request->rol,
            'contrasena' => Hash::make($request->contrasena), // Encripta la contraseña
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario agregado correctamente.');
    }

    public function actualizar(Request $request, $id)
    {
        // Valida los datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'rol' => 'required|integer',
            'contrasena' => 'nullable|string|min:6',
        ]);

        // Actualizar el usuario
        $usuario = Usuario::findOrFail($id);
        $usuario->nombre = $request->nombre;
        $usuario->rol = $request->rol;

        if ($request->contrasena) {
            $usuario->contrasena = Hash::make($request->contrasena); 
        }

        $usuario->save();

        return redirect()->route('usuarios.index')->with('actialisado', 'Usuario actualizado.');
    }

    public function eliminar($id)
    {
        // Eliminar el usuario
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('Eliminado', 'Usuario eliminado.');
    }
}
