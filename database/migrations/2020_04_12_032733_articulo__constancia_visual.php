<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ArticuloConstanciaVisual extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulo_Constancia_visual',function(Blueprint $table){
            $table->unsignedBigInteger('articulo_id');
            $table->foreign('articulo_id')->references('id')->on('articulo');
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
        Schema::drop('articulo_Constancia_visual');
    }
}
