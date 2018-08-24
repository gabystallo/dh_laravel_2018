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
}
