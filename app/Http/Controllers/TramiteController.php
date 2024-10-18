<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tramite;
use App\Models\Beneficiario;
use App\Models\Libro;
use App\Models\Top;

class TramiteController extends Controller
{
    public function index()
    {
        // Obtener todos los trámites
        $tramites = Tramite::all();
        $libros = Libro::where('estado', 1)->get(); // Libros disponibles
        return view('tramites', compact('tramites', 'libros'));
    }

    public function guardar(Request $request)
    {
        if ($request->has('nuevo_usuario')) {
            //crear nuevo beneficiario
            $request->validate([
                'id_beneficiario' => 'required|integer',
                'nombre_beneficiario' => 'required|string|max:255',
            ]);

            Beneficiario::create([
                'id_beneficiario' => $request->id_beneficiario,
                'nombre' => $request->nombre_beneficiario,
                'servicio' => 1, // Primer servicio
            ]);

            $tipo = 1; // Siempre préstamo para nuevos usuarios
        } else {
            // Validar el tipo de trámite y aumentar contador de servicios si es un préstamo
            $request->validate([
                'id_beneficiario' => 'required|integer',
                'tipo' => 'required|integer',
            ]);

            $tipo = $request->tipo;

            if ($tipo == 1) {
                $beneficiario = Beneficiario::findOrFail($request->id_beneficiario);
                $beneficiario->increment('servicio');
            }
        }

        // Crear el trámite y actualizar el estado del libro
        $request->validate([
            'id_libro' => 'required|integer',
        ]);

        $libro = Libro::findOrFail($request->id_libro);
        $estadoLibro = $tipo == 1 ? 2 : 1; // 1 Entregado, 2 Prestado
        $libro->estado = $estadoLibro;
        $libro->save();

        Tramite::create([
            'id_libro' => $request->id_libro,
            'id_beneficiario' => $request->id_beneficiario,
            'fecha' => now(), // Fecha actual
            'tipo' => $tipo,
        ]);

        // Actualizar la tabla Top
        if ($tipo == 1) {
            $top = Top::where('nombre', $libro->nombre)->first();

            if ($top) {
                $top->increment('contador');
            } else {
                Top::create([
                    'nombre' => $libro->nombre,
                    'contador' => 1,
                ]);
            }
        }

        return redirect()->route('tramites.index')->with('success', 'Trámite creado correctamente.');
    }

    public function actualizar(Request $request, $id)
    {

        $request->validate([
            'id_libro' => 'required|integer',
            'id_beneficiario' => 'required|integer',
            'tipo' => 'required|integer',
        ]);

        // Actualizar el trámite
        $tramite = Tramite::findOrFail($id);
        $tramite->id_libro = $request->id_libro;
        $tramite->id_beneficiario = $request->id_beneficiario;
        $tramite->tipo = $request->tipo;
        $tramite->save();

        return redirect()->route('tramites.index')->with('success', 'Trámite actualizado.');
    }

    public function eliminar($id)
    {
        // Eliminar el trámite
        $tramite = Tramite::findOrFail($id);
        $tramite->delete();

        return redirect()->route('tramites.index')->with('success', 'Trámite eliminado.');
    }
}
