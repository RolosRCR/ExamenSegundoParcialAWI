<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Top extends Model
{
    protected $table = 'tops';
    protected $primaryKey = 'id';
    protected $fillable = ['titulo', 'contador'];
}

