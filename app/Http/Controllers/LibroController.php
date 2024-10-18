<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

class LibroController extends Controller
{
    public function index()
    {
        // Obtener todos los libros
        $libros = Libro::all();
        return view('libros', compact('libros'));
    }

    public function guardar(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'id_libro' => 'required|integer',
            'nombre' => 'required|string|max:255',
        ]);

        // Crear nuevo libro
        Libro::create([
            'id_libro' => $request->id_libro,
            'nombre' => $request->nombre,
            'estado' => 1,
        ]);

        return redirect()->route('libros.index')->with('success', 'Libro agregado correctamente.');
    }

    public function actualizar(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'estado' => 'required|integer',
        ]);

        // Actualizar el libro
        $libro = Libro::findOrFail($id);
        $libro->nombre = $request->nombre;
        $libro->estado = $request->estado;
        $libro->save();

        return redirect()->route('libros.index')->with('success', 'Libro actualizado.');
    }

    public function eliminar($id)
    {
        // Eliminar libro
        $libro = Libro::findOrFail($id);
        $libro->delete();

        return redirect()->route('libros.index')->with('success', 'Libro eliminado.');
    }
}
