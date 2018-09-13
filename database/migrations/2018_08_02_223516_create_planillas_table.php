<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planillas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('asignacion_id')->unsigned();
            $table->foreign('asignacion_id')->references('id')->on('asignacions')->onDelete('cascade');
            $table->integer('periodo');
            $table->string('codigo');
            $table->boolean('modificada');
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
        Schema::dropIfExists('planillas');
    }
}
