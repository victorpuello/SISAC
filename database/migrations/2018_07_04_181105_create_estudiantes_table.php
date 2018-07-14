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
