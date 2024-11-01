<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiario extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_beneficiario';
    protected $fillable = ['nombre', 'numero_de_prestamos'];
}
