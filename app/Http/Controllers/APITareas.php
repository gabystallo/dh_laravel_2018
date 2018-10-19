<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Tarea;
use App\Autor;

class APITareas extends Controller
{

	function __construct()
	{
		$this->middleware('auth:api');
        $this->middleware('permitir.origen');
	}

    public function lista()
    {
    	$tareas = Tarea::with('autor')->with('etiquetas')->orderBy('created_at', 'desc')->get();

    	//$tareas = json_encode($tareas);
    	//$tareas = $tareas->toJson();

    	return [
    		'usuario' => Auth::user(),
    		'tareas' => $tareas
    	];
    }

    public function detalle(Request $request)
    {
    	$id = $request->input('id');

    	//$tarea = Tarea::findOrFail($id);

    	//$tarea = Tarea::with('autor')->with('etiquetas')->where('id', $id)->first();
    	$tarea = Tarea::with('autor')->with('etiquetas')->find($id);

    	return $tarea;
    }

    public function crear(Request $request)
    {
        $autor = Autor::inRandomOrder()->first();

        $tarea = new Tarea;
        $tarea->fill($request->all());

        $autor->tareas()->save($tarea);

        return ['resultado' => 'ok'];
    }
}
