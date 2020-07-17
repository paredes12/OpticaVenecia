<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DireccionEmpresa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direccion_empresa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('colonia_empresa',16);
            $table->string('calle_empresa',16);
            $table->string('domicilio_empresa',16);
            $table->unsignedBigInteger('lugar_de_trabajo_id');
            $table->foreign('lugar_de_trabajo_id')->references('id')->on('lugar_De_Trabajo');
            $table->unsignedBigInteger('municipio_id');
            $table->foreign('municipio_id')->references('id')->on('municipio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('direccion_cliente');
    }
}
