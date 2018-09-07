<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaTareasEtiquetas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tareas_etiquetas', function (Blueprint $table) {
            $table->integer('id_tarea')->unsigned();
            $table->integer('id_etiqueta')->unsigned();

            $table->foreign('id_tarea')->references('id')->on('tareas');
            $table->foreign('id_etiqueta')->references('id')->on('etiquetas');

            $table->primary(['id_tarea', 'id_etiqueta']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tareas_etiquetas');
    }
}
