<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Planilla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planilla', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->float('isss_planilla');
            $table->float('afp_planilla');
            $table->float('anticipo_planilla');
            $table->float('prestamo_planilla');
            $table->float('bono_venta_planilla');
            $table->float('vacacion_anual');
            $table->float('total_descuento');
            $table->float('total_a_pagar');
            $table->date('fecha_pago_planilla');
            $table->unsignedBigInteger('empleado_id');
            $table->foreign('empleado_id')->references('id')->on('empleado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('planilla');
    }
}
