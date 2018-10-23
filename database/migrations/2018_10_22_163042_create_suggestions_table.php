<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuggestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suggestions', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('category',['cognitivo','procedimental','actitudinal']);
            $table->enum('indicator',['bajo','basico','alto','superior']);
            $table->text('description');
            $table->integer('pack')->unsigned();
            $table->integer('grado_id')->unsigned();
            $table->foreign('grado_id')->references('id')->on('grados');
            $table->integer('asignatura_id')->unsigned();
            $table->foreign('asignatura_id')->references('id')->on('asignaturas');
            $table->integer('suggestiontable_id')->unsigned();
            $table->string('suggestiontable_type');
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
        Schema::dropIfExists('suggestions');
    }
}
