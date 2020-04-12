<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReferenciaFamiliar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Referencia_familiar',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('nombre_referencia',100);
            $table->string('telefono_referencia',9);
            $table->string('celular_referencia',9);   
            $table->unsignedBigInteger('credito_id');
            $table->foreign('credito_id')->references('id')->on('Credito');
            $table->unsignedBigInteger('parentesco_id');
            $table->foreign('parentesco_id')->references('id')->on('Parentesco');         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Referencia_familiar');
    }
}
