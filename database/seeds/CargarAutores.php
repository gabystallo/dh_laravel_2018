<?php

use Illuminate\Database\Seeder;

use App\Autor;
use App\Tarea;

class CargarAutores extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	// EJEMPLO SIN USAR FACTORIES:
        // DB::table('autores')->insert([
        // 	'nombre' => 'Gaby',
        // 	'created_at' => date('Y-m-d H:i:s'),
        // 	'updated_at' => date('Y-m-d H:i:s')
        // ]);

        // DB::table('autores')->insert([
        // 	'nombre' => 'Kevin',
        // 	'created_at' => date('Y-m-d H:i:s'),
        // 	'updated_at' => date('Y-m-d H:i:s')
        // ]);

        //CON FACTORIES

        factory(Autor::class)->times(5)->create()->each(function($autor) {
        	$autor->tareas()->save(factory(Tarea::class)->make());
        });
    }
}
