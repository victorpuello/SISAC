<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('name',['1','2','3','4','5','6','7','8','9','10','A','B','C','D','E','F','G','H','I','J']);
            $table->enum('modelo',['tradicional','escuela nueva','etnoeducación','Aceleración','decreto 3011']);
            $table->integer('grado_id')->unsigned();
            $table->foreign('grado_id')->references('id')->on('grados');
            $table->integer('jornada_id')->unsigned();
            $table->foreign('jornada_id')->references('id')->on('jornadas');
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
        Schema::dropIfExists('grupos');
    }
}
