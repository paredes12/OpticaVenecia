<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cliente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cliente', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_cliente',32);
            $table->string('apellido_cliente',32);
            $table->string('dui_cliente',10);
            $table->string('nit_cliente',17);
            $table->string('telefono_cliente',17);
            $table->unsignedBigInteger('lugar_de_trabajo_id');
            $table->foreign('lugar_de_trabajo_id')->references('id')->on('Lugar_De_Trabajo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Cliente');
    }
}
