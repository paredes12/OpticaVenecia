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
        Schema::create('cliente_venta',function(Blueprint $table){
            $table->unsignedBigInteger('venta_id');
            $table->foreign('venta_id')->references('id')->on('venta');
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('cliente');
            $table->unsignedBigInteger('credito_id');
            $table->foreign('credito_id')->references('id')->on('credito');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cliente_venta');
    }
}
