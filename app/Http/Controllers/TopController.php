<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beneficiario;
use App\Models\Top;

class TopController extends Controller
{
    public function showTop()
    {
        $topBeneficiarios = Beneficiario::orderBy('servicio', 'desc')->take(8)->get();
        $topLibros = Top::orderBy('contador', 'desc')->take(8)->get();

        return view('top', compact('topBeneficiarios', 'topLibros'));
    }
}
