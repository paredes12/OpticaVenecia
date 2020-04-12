<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Credito extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Credito',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('monto_en_letra',256);
            $table->float('monto');
            $table->float('valor_cuota');
            $table->string('detalle_promocion',256);
            $table->unsignedBigInteger('tipo_cuota_id');
            $table->foreign('tipo_cuota_id')->references('id')->on('Tipo_cuota');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Credito');
    }
}
