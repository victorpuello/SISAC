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
            $table->increments('id');
            $table->string('name');
            $table->string('lastname');
            $table->enum('typeid',['RC','TI','CC','DE']);
            $table->string('identification')->unique();
            $table->string('birthstate');
            $table->string('birthcity');
            $table->enum('gender',['M','F']);
            $table->string('address');
            $table->string('EPS');
            $table->string('phone');
            $table->date('datein');
            $table->date('dateout')->nullable();
            $table->string('path');
            $table->enum('stade',['activo','retirado','graduado']);
            $table->enum('situation',['repitente','promovido','normal']);
            $table->integer('salon_id')->unsigned();
            $table->foreign('salon_id')->references('id')->on('salons')->onDelete('cascade');
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
