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



    public function mostrarFormSubir()
    {
    	return view('pruebas.form-subir');
    }

    public function subir(Request $request)
    {

    	$this->validate(
    		$request,
    		[
    			'archivo' => 'required|image|mimetypes:image/jpeg|max:2048'
    		]
    	);
    	
    	$archivo = $request->file('archivo');

    	if($archivo) {

	    	//$archivo->store('carpeta/subcarpeta');

	    	//$archivo->extension()
	    	//$archivo->getClientOriginalName();

	    	//$nombre = str_random(10) . 'imagen.' . $archivo->extension();

	    	$nombre = 'imagen.jpg';

	    	$archivo->storeAs('public', $nombre);
	    } else {
	    	//abort(404);
	    	return 'errorrrrr';
	    }

    	return back();

    }
}
