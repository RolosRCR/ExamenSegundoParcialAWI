<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopsTable extends Migration
{
    public function up()
    {
        Schema::create('tops', function (Blueprint $table) {
            $table->increments('id'); 
            $table->string('titulo');
            $table->integer('contador')->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('tops');
    }
}

