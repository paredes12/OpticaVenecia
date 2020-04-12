<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermisoRol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Permiso_rol',function(Blueprint $table){
            $table->unsignedBigInteger('permiso_id');
            $table->foreign('permiso_id')->references('id')->on('Permiso');
            $table->unsignedBigInteger('rol_id');
            $table->foreign('rol_id')->references('id')->on('Rol');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Permiso_rol');
    }
}
