<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ExpedienteCliente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Expediente_cliente', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('edad_expediente_cliente');
            $table->enum('sexo_expediente_cliente', ['Masculino', 'Femenino']);
            $table->string('detalle_cirugia',256);
            $table->float('distancia_pupilar');
            $table->float('altura_ojo_derecho');
            $table->float('altura_ojo_izquierdo');
            $table->float('desentracion_nasal');
            $table->float('dnp_ojo_derecho');
            $table->float('dnp_ojo_izquierdo');
            $table->tinyInteger('computadora_exp');
            $table->tinyInteger('tv_exp');            
            $table->tinyInteger('sol_exp');
            $table->tinyInteger('cel_exp');
            $table->string('observacion_exp',100);
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('Cliente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Expediente_cliente');
    }
}
