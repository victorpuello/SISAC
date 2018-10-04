<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('horas');
            $table->boolean('director')->default(false);
            $table->boolean('active')->default(true);
            $table->integer('anio_id')->unsigned();
            $table->foreign('anio_id')->references('id')->on('anios');
            $table->integer('asignatura_id')->unsigned();
            $table->foreign('asignatura_id')->references('id')->on('asignaturas')->onDelete('cascade');
            $table->integer('docente_id')->unsigned();
            $table->foreign('docente_id')->references('id')->on('docentes')->onDelete('cascade');
            $table->integer('grupo_id')->unsigned();
            $table->foreign('grupo_id')->references('id')->on('grupos')->onDelete('cascade');
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
        Schema::dropIfExists('asignacions');
    }
}
