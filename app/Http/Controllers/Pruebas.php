<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tarea;

use Ixudra\Curl\Facades\Curl;

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
    			'archivo' => 'required|image|mimetypes:image/jpeg,image/png|max:2048'
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


    public function consultarApi()
    {
        //GET https://apis.datos.gob.ar/georef/api/provincias
        //devuelve listado de provincias en formato JSON

        $provincias = Curl::to('https://apis.datos.gob.ar/georef/api/provincias')
            ->asJson(true)
            ->get();

        return view('provincias', compact('provincias'));
    }

    public function consultarApiConVariables()
    {
        $latitud = -34.642922;
        $longitud = -58.550054;

        $info = Curl::to('https://apis.datos.gob.ar/georef/api/ubicacion')
            ->asJson(true)
            ->withData(['lat'=>$latitud, 'lon'=>$longitud])
            ->get();

        dd($info);
    }
}
