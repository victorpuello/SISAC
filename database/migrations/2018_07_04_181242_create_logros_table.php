<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->text('description');
            $table->enum('indicador',['bajo','basico','alto','superior']);
            $table->enum('category',['cognitivo','procedimental','actitudinal']);
            $table->enum('grade',['1','2','3','4','5','6','7','8','9','10','11']);
            $table->integer('asignatura_id')->unsigned();
            $table->foreign('asignatura_id')->references('id')->on('asignaturas')->onDelete('cascade');
            $table->integer('docente_id')->unsigned();
            $table->foreign('docente_id')->references('id')->on('docentes')->onDelete('cascade');
            $table->integer('periodo_id')->unsigned();
            $table->foreign('periodo_id')->references('id')->on('periodos')->onDelete('cascade');
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
        Schema::dropIfExists('logros');
    }
}
