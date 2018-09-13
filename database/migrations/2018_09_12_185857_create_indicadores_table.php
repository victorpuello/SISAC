<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndicadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicadores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->integer('logro_id')->unsigned();
            $table->foreign('logro_id')->references('id')->on('logros');
            $table->integer('periodo_id')->unsigned();
            $table->foreign('periodo_id')->references('id')->on('periodos');
            $table->integer('docente_id')->unsigned();
            $table->foreign('docente_id')->references('id')->on('docentes');
            $table->enum('indicador',['bajo','basico','alto','superior']);
            $table->text('description');
            $table->unique('code');
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
        Schema::dropIfExists('indicadores');
    }
}
