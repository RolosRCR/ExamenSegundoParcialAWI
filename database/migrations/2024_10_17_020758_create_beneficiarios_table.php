<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiariosTable extends Migration
{
    public function up()
    {
        Schema::create('beneficiarios', function (Blueprint $table) {
            $table->increments('id_beneficiario');
            $table->string('nombre');
            $table->unsignedInteger('servicio')->default(0); // Inicialmente en 0
        });
    }

    public function down()
    {
        Schema::dropIfExists('beneficiarios');
    }
}
