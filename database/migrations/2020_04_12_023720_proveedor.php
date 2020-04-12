<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Proveedor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Proveedor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('proveedor',32);
            $table->string('registro_proveedor',16);
            $table->string('correo_proveedor',32);
            $table->string('direccion_proveedor',32);
            $table->unsignedBigInteger('pais_id');
            $table->foreign('pais_id')->references('id')->on('Pais');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Proveedor');
    }
}
