<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Lente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lente', function (Blueprint $table) {
            $table->unsignedBigInteger('material_id');
            $table->foreign('material_id')->references('id')->on('material');
            $table->unsignedBigInteger('tipo_lente_id');
            $table->foreign('tipo_lente_id')->references('id')->on('tipo_lente');
            $table->unsignedBigInteger('proteccion_id');
            $table->foreign('proteccion_id')->references('id')->on('proteccion');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lente');
    }
}
