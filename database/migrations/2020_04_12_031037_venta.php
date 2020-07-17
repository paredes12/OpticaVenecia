<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Venta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->date('fecha_venta');       
            $table->unsignedBigInteger('empleado_id');
            $table->foreign('empleado_id')->references('id')->on('empleado'); 
            $table->unsignedBigInteger('cita_entrega_lente_id');
            $table->foreign('cita_entrega_lente_id')->references('id')->on('cita_entrega_lente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('venta');
    }
}
