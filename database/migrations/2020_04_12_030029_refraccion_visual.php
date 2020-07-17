<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RefraccionVisual extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refraccion_visual', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('ojo', ['Derecho', 'Izquierdo']);
            $table->string('esfera',16);
            $table->string('cilindro',16);            
            $table->string('eje',16);
            $table->string('adicion',16);
            $table->string('prisma',16);
            $table->unsignedBigInteger('constancia_visual_id');
            $table->foreign('constancia_visual_id')->references('id')->on('constancia_visual');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('refraccion_visual');
    }
}
