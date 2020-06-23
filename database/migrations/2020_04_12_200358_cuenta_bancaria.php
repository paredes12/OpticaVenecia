<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CuentaBancaria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cuenta_bancaria',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('nombre_cuenta',32);
            $table->string('apellido_cuenta',32);
            $table->string('banco_cuenta',32);
            $table->string('numero_cuenta',16);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Cuenta_bancaria');
    }
}
