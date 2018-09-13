<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitucionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institucions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('siglas');
            $table->string('resolucion');
            $table->string('dane');
            $table->string('nit');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('rector');
            $table->string('idrector');
            $table->string('slogan');
            $table->string('path');
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
        Schema::dropIfExists('institucions');
    }
}
