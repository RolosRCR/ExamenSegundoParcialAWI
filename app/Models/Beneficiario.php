<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beneficiario extends Model
{
    protected $table = 'beneficiarios';
    protected $primaryKey = 'id_beneficiario';
    protected $fillable = ['nombre', 'servicio'];
}

