<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RegistroDePago extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_de_pago',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->date('fecha_registro_pago');
            $table->float('cargo_registro_pago');
            $table->float('abono_registro_pago');
            $table->float('resta_registro_pago');
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
       Schema::drop('registro_de_pago');
    }
}
