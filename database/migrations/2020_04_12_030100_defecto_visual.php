<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DefectoVisual extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('defecto_visual', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('nombre_defecto_visual',16);
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
        Schema::drop('defecto_visual');
    }
}
