<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->increments('id');//ok
            $table->string('name');//ok
            $table->string('lastname');//ok
            $table->enum('typeid',['RC','TI','CC','DE']);//ok
            $table->integer('identification')->unique();//ok
            $table->date('birthday');//ok
            $table->string('birthstate');//ok
            $table->string('birthcity');//ok
            $table->enum('gender',['M','F']);//ok
            $table->string('address');// ok
            $table->string('EPS');//ok
            $table->string('phone');//ok
            $table->date('datein');//ok
            $table->date('dateout')->nullable();//ok
            $table->string('path');//ok
            $table->enum('stade',['activo','retirado','graduado']);//ok
            $table->enum('situation',['nuevo','repitente','promovido','normal'])->default('nuevo');//ok
            $table->integer('grupo_id')->unsigned();
            $table->foreign('grupo_id')->references('id')->on('grupos');
            $table->softDeletes();
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
        Schema::dropIfExists('estudiantes');
    }
}
