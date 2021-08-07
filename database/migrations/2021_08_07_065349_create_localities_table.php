<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('municipio_id');
            $table->foreign('municipio_id')->references('id')->on('municipalities');
            $table->string('clave', 4);
            $table->string('nombre', 100);
            $table->string('latitud', 15);
            $table->string('longitud', 15);
            $table->string('altitud', 15);
            $table->string('carta', 10);
            $table->string('ambito', 1);
            $table->integer('poblacion');
            $table->integer('masculino');
            $table->integer('femenino');
            $table->integer('viviendas');
            $table->decimal('lat', $precision = 10, $scale = 7);
            $table->decimal('lng', $precision = 10, $scale = 7);
            $table->tinyInteger('activo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('localities');
    }
}
