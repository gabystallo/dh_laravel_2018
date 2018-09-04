<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tarea;

class Pruebas extends Controller
{
    public function colecciones()
    {
    	$tareas = Tarea::all();

    	//$tareas = $tareas->all();

    	//return $tareas->implode('descripcion', ', ');

    	//return $tareas->toJson();

    	//dd($tareas->pluck('descripcion'));

    	//return ($tareas->sortBy('descripcion')->pluck('descripcion')->toJson());

    	// return $tareas->filter(function($item) {
    	// 		return strpos($item->descripcion, 'perro');
    	// 	})
    	// ->toJson();

    	return $tareas->map(function($tarea) {
    		$tareaNueva = $tarea;
    		$tareaNueva->descripcion = strtoupper($tareaNueva->descripcion);
    		return $tareaNueva;
    	})
    	->toJson();

    	dd($tareas);
    }
}
