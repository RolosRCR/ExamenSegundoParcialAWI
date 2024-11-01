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
            $table->unsignedInteger('id_libro');
            $table->unsignedInteger('id_beneficiario');
            $table->date('fecha')->default(now());
            $table->integer('tipo'); // 1: Préstamo, 2: Entrega

            // Agregar claves foráneas
            $table->foreign('id_libro')->references('id_libro')->on('libros')->onDelete('cascade');
            $table->foreign('id_beneficiario')->references('id_beneficiario')->on('beneficiarios')->onDelete('cascade');
        });
    }

    public function down()
{
    // Solo intenta eliminar la clave foránea si existe
    Schema::table('tramites', function (Blueprint $table) {
        if (Schema::hasColumn('tramites', 'id_libro')) {
            $table->dropForeign(['id_libro']);
        }
        if (Schema::hasColumn('tramites', 'id_beneficiario')) {
            $table->dropForeign(['id_beneficiario']);
        }
    });

    Schema::dropIfExists('tramites');
}

}
