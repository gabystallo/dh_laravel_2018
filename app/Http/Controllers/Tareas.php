<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Tareas extends Controller
{
    public function listar()
    {
    	return view('tareas.lista');
    }


    public function verDetalle($tarea)
    {
    	$dia = date('d/m/Y');
    	
    	//return 'detalle de la tarea id: ' . $tarea;
    	
    	//return view('tareas.detalle',['tarea'=>$tarea, 'dia'=>$dia]);
    	
    	return view('tareas.detalle', compact('tarea', 'dia'));

    }
}