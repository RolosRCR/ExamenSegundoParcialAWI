<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTramitesTable extends Migration
{
    public function up()
    {
        Schema::create('tramites', function (Blueprint $table) {
            $table->increments('id_tramite');
            $table->unsignedInteger('id_libro'); // Referencia manual a la tabla libros
            $table->unsignedInteger('id_beneficiario'); // Referencia manual a la tabla beneficiarios
            $table->date('fecha')->default(now());
            $table->integer('tipo'); // 1: Préstamo, 2: Entrega
        });
    }

    public function down()
    {
        Schema::dropIfExists('tramites');
    }
}

