<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DescuentoEmpresarial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descuento_empresarial',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->date('fecha_descuento_empresarial');
            $table->string('retencion_de_sueldo_letra',64);
            $table->float('retencion_sueldo');
            $table->unsignedBigInteger('cuenta_bancaria_id');
            $table->foreign('cuenta_bancaria_id')->references('id')->on('cuenta_bancaria');
            $table->unsignedBigInteger('empleado_id');
            $table->foreign('empleado_id')->references('id')->on('empleado');
            $table->unsignedBigInteger('credito_id');
            $table->foreign('credito_id')->references('id')->on('credito');
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('cliente');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('descuento_empresarial');
    }
}
