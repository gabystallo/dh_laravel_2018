<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tarea;
use App\Autor;
use App\Etiqueta;

class Tareas extends Controller
{
    protected $tareas;


    public function listar()
    {
        //$tareas = Tarea::all();
        $tareas = Tarea::with('autor')->get();

        //dd($tareas);

    	return view('tareas.lista', compact('tareas'));
    }


    public function verDetalle(Tarea $tarea)
    {
    	//$tarea = Tarea::findOrFail($tarea);

        $autor = $tarea->autor;
        return view('tareas.detalle', compact('tarea', 'autor'));

    }

    public function crear()
    {
        $tarea = new Tarea;
        return view('tareas.crear', compact('tarea'));
    }

    public function guardar(Request $request)
    {

        $this->validate(
            $request,
            [
                'descripcion' => 'required|max:20',
                'autor' => 'required'
            ],
            [
                'descripcion.required' => 'Eh loco, completá la descripción'
            ],
            [
                'descripcion' => 'descripción'
            ]
        );

        $tarea = new Tarea;
        // $tarea->descripcion = $request->input('descripcion');
        // $tarea->autor = $request->input('autor');
        $tarea->fill($request->all());
        $tarea->save();

        return redirect('/tareas');
    }

    public function editar(Tarea $tarea)
    {
        return view('tareas.editar', compact('tarea'));
    }

    public function actualizar(Tarea $tarea, Request $request)
    {
        $this->validate(
            $request,
            [
                'descripcion' => 'required|max:20',
                'autor' => 'required'
            ],
            [
                'descripcion.required' => 'Eh loco, completá la descripción'
            ],
            [
                'descripcion' => 'descripción'
            ]
        );

        $tarea->fill($request->all());
        $tarea->save();

        return redirect('/tareas');
    }

    public function eliminar(Tarea $tarea)
    {
        $tarea->delete();
        return redirect('/tareas');
    }

    public function porAutor(Autor $autor)
    {
        $tareas = $autor->tareas;
        return view('tareas.lista', compact('tareas'));
    }
}
