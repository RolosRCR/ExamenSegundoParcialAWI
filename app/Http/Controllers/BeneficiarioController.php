<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beneficiario;

class BeneficiarioController extends Controller
{
    public function index()
    {
        $beneficiarios = Beneficiario::all();
        return view('beneficiarios', compact('beneficiarios'));
    }

    public function crear(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'id_beneficiario' => 'required|integer|unique:beneficiarios',
            'nombre' => 'required|string|max:255',
        ]);

        // Crear nuevo beneficiario
        Beneficiario::create([
            'id_beneficiario' => $request->id_beneficiario,
            'nombre' => $request->nombre,
            'servicios' => 1, // Primer servicio
        ]);

        return redirect()->route('beneficiarios.index')->with('success', 'Beneficiario agregado correctamente.');
    }

    public function actualizar(Request $request, $id)
    {
        // Validar los datos
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        // Actualizar el beneficiario
        $beneficiario = Beneficiario::findOrFail($id);
        $beneficiario->nombre = $request->nombre;
        $beneficiario->save();

        return redirect()->route('beneficiarios.index')->with('success', 'Beneficiario actualizado.');
    }

    public function eliminar($id)
    {
        // Eliminar el beneficiario
        $beneficiario = Beneficiario::findOrFail($id);
        $beneficiario->delete();

        return redirect()->route('beneficiarios.index')->with('success', 'Beneficiario eliminado.');
    }
}
