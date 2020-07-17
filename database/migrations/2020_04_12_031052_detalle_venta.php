<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetalleVenta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_venta',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->integer('cantidad_articulo');
            $table->float('precio_unitario');
            $table->float('subtotal');
            $table->unsignedBigInteger('venta_id');
            $table->foreign('venta_id')->references('id')->on('venta');
            $table->unsignedBigInteger('articulo_id');
            $table->foreign('articulo_id')->references('id')->on('articulo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('detalle_venta');
    }
}
