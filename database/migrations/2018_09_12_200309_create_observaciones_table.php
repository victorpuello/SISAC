<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObservacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('valoracion');
            $table->integer('aspecto_id')->unsigned();
            $table->foreign('aspecto_id')->references('id')->on('aspectos');
            $table->integer('estudiante_id')->unsigned();
            $table->foreign('estudiante_id')->references('id')->on('estudiantes');
            $table->integer('periodo_id')->unsigned();
            $table->foreign('periodo_id')->references('id')->on('periodos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('observaciones');
    }
}
