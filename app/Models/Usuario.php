<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    public $timestamps = false;

    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    protected $fillable = ['id_usuario', 'contrasena', 'nombre', 'rol']; 

    // La autenticación es con 'id_usuario'
    public function getAuthIdentifierName()
    {
        return 'id_usuario';
    }
    public function confirmarEliminacion($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.confirmar-eliminacion', compact('usuario'));
    }

    
}
