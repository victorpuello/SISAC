<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstandarGradoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estandar_grado', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estandar_id')->unsigned();
            $table->integer('grado_id')->unsigned();
            $table->foreign('estandar_id')->references('id')->on('estandars');
            $table->foreign('grado_id')->references('id')->on('grados');
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
        Schema::dropIfExists('estandar_grado');
    }
}
