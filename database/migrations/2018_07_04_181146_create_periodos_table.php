<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('datestart');
            $table->date('dateend')->nullable();
            $table->dateTime('cierre')->nullable($value = true);
            $table->enum('estado',['finalizado','activo','inactivo'])->default('activo');
            $table->integer('anio_id')->unsigned();
            $table->foreign('anio_id')->references('id')->on('anios');
            $table->boolean('isFinal')->default(false);
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('periodos');
    }
}
