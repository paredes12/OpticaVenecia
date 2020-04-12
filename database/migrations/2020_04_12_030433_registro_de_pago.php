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
        Schema::create('Registro_de_pago',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->date('fecha_registro_pago');
            $table->float('cargo_registro_pago');
            $table->float('abono_registro_pago');
            $table->float('resta_registro_pago');
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
       Schema::drop('Registro_de_pago');
    }
}
