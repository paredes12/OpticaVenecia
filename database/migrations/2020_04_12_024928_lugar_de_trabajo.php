<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LugarDeTrabajo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Lugar_De_Trabajo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_empresa');
            $table->string('jefe_cliente');
            $table->string('telefono_empresa');
            $table->string('cargo_cliente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Lugar_De_Trabajo');
    }
}
