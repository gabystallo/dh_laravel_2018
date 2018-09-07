<?php

// php artisan make:migration crear_tabla_sarasa --create=sarasa
// php artisan make:migration agregar_campo_comentario --table=tareas

// php artisan migrate #migra todo lo pendiente
// php artisan migrate:rollback #deshace el último migrate
// php artisan migrate:reset #deshace todos los migrate
// php artisan migrate:refresh #deshace y rehace todos los migrate

// composer dump-autoload #composer regenera el autoloader con los cambios de la carpeta migrations

// php artisan db:seed #correr todos los seeds del seeder
// php artisan migrate:refresh --seed #refresh + seeds

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaAutores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autores', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('nombre');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('autores');
    }
}
