<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tarea;

class Tareas extends Controller
{
    protected $tareas;


    public function listar()
    {
        $tareas = Tarea::all();

    	return view('tareas.lista', compact('tareas'));
    }

    public function primera()
    {
        //$tarea = Tarea::first();
        $tarea = Tarea::find(1);
        return $tarea->descripcion;
    }

    public function buscarPorAutor($autor)
    {
        $tareas = Tarea::where('autor', $autor)->get();

        return view('tareas.lista', compact('tareas'));
    }


    public function verDetalle(Tarea $tarea)
    {
    	//$tarea = Tarea::findOrFail($tarea);

        return view('tareas.detalle', compact('tarea'));

    }

    public function crear()
    {
        return view('tareas.crear');
    }

    public function guardar(Request $request)
    {

        $this->validate(
            $request,
            [
                'descripcion' => 'required',
                'autor' => 'required'
            ],
            [
                'descripcion.required' => 'Eh loco, completá la descripción'
            ],
            [
                'descripcion' => 'descripción'
            ]

        );

        return 'hola';
    }
}
