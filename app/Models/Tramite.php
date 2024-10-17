<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tramite extends Model
{
    protected $table = 'tramites';
    protected $primaryKey = 'id_tramite';
    protected $fillable = ['id_libro', 'id_beneficiario', 'fecha', 'tipo'];
}
