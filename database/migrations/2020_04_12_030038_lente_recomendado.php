<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LenteRecomendado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lente_recomendado', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('nombre_lente_recomendado',32);
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
        Schema::drop('lente_recomendado');
    }
}
