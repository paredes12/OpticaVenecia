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
        Schema::create('Detalle_venta',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->integer('cantidad_articulo');
            $table->float('precio_unitario');
            $table->float('subtotal');
            $table->unsignedBigInteger('venta_id');
            $table->foreign('venta_id')->references('id')->on('Venta');
            $table->unsignedBigInteger('articulo_id');
            $table->foreign('articulo_id')->references('id')->on('Articulo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Detalle_venta');
    }
}
