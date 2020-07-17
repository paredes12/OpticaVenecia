<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProteccionRecomendado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proteccion_recomendado',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('nombre_proteccion_recomendado');
            $table->unsignedBigInteger('constancia_visual_id');
            $table->foreign('constancia_visual_id')->references('id')->on('constancia_visual');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('proteccion_recomendado');
    }
}
