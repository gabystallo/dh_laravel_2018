<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Tareas extends Controller
{
    public function listar()
    {
        $tareas = ['Tarea 1', 'Tarea 2', 'Otra tarea', 'Otra tarea más'];
        //$tareas = [];
    	return view('tareas.lista', compact('tareas'));
    }
    public function verDetalle($tarea)
    {
    	$dia = date('d/m/Y');    	
    	
    	return view('tareas.detalle', compact('tarea', 'dia'));

    }
}
