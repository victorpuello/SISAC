<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDefinitivasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('definitivas', function (Blueprint $table) {
            $table->increments('id');
            $table->float('score');
            $table->enum('indicador',['bajo','basico','alto','superior']);
            $table->integer('estudiante_id')->unsigned();
            $table->foreign('estudiante_id')->references('id')->on('estudiantes');
            $table->integer('asignatura_id')->unsigned();
            $table->foreign('asignatura_id')->references('id')->on('asignaturas');
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
        Schema::dropIfExists('definitivas');
    }
}
