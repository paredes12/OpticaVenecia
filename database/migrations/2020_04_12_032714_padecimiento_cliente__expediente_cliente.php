<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PadecimientoClienteExpedienteCliente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Padecimiento_c_Expediente_c',function(Blueprint $table){
            $table->unsignedBigInteger('padecimiento_cliente_id');
            $table->foreign('padecimiento_cliente_id')->references('id')->on('Padecimiento_cliente');
            $table->unsignedBigInteger('expediente_cliente_id');
            $table->foreign('expediente_cliente_id')->references('id')->on('Expediente_cliente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Padecimiento_cliente_Expediente_cliente');
    }
}
