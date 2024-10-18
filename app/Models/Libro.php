<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    public $timestamps = false;
    protected $table = 'libros';
    protected $primaryKey = 'id_libro';
    protected $fillable = ['id_libro','nombre', 'estado'];
}

