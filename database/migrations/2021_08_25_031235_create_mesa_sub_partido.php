<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMesaSubPartido extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mesa_sub_partido', function (Blueprint $table) {
            $table->id();
            $table->integer('voto_senador');
            $table->integer('voto_diputado');
            $table->timestamps();

            $table->unsignedBigInteger('mesa_id');
            $table->unsignedBigInteger('sub_partido_id');
            $table->foreign('mesa_id')->references('id')->on('mesas')->onDelete('cascade');
            $table->foreign('sub_partido_id')->references('id')->on('sub_partidos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mesa_sub_partido');
    }
}
