<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClienteVenta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cliente_venta',function(Blueprint $table){
            $table->unsignedBigInteger('venta_id');
            $table->foreign('venta_id')->references('id')->on('Venta');
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('Cliente');
            $table->unsignedBigInteger('credito_id');
            $table->foreign('credito_id')->references('id')->on('Credito');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Cliente_venta');
    }
}
