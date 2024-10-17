<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    public $timestamps = false;

    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    protected $fillable = ['contrasena', 'nombre', 'rol'];

    // Indica que el identificador de autenticación es 'id_usuario'
    public function getAuthIdentifierName()
    {
        return 'id_usuario';
    }
}
