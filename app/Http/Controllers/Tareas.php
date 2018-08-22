<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tarea;

class Tareas extends Controller
{
    protected $tareas;


    public function listar()
    {
        // $tareas = Tarea::where('autor', 'kevin');

        // $tareas = $tareas->where('id', '>=', '3');

        // $tareas = $tareas->get();

        $tareas = Tarea::where('autor', 'kevin')
            ->orderBy('id', 'desc')
            ->where('id', '>=', 3)

        ->get();


        //$tareas = Tarea::all();

        //$tareas = $this->tareas;
        //$tareas = [];
    	return view('tareas.lista', compact('tareas'));
    }

    public function primera()
    {
        //$tarea = Tarea::first();
        $tarea = Tarea::find(1);
        return $tarea->descripcion;
    }



    public function verDetalle($tarea)
    {
    	$dia = date('d/m/Y');    	
    	
    	return view('tareas.detalle', compact('tarea', 'dia'));

    }
}
