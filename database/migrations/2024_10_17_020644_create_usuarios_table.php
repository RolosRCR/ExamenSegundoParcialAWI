<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id_usuario');
            $table->string('nombre');
            $table->string('contrasena');            
            $table->unsignedInteger('rol'); // 1: Administrador, 2: Bibliotecario
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
