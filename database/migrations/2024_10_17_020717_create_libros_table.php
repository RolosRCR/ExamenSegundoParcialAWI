<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrosTable extends Migration
{
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->increments('id_libro');
            $table->string('nombre');
            $table->boolean('estado')->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('libros');
    }
}
