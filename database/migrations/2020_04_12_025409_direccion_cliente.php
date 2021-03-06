<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DireccionCliente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direccion_cliente', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('colonia_cliente',16);
            $table->string('calle_cliente',16);
            $table->string('domicilio_cliente',16);
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('cliente');
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
