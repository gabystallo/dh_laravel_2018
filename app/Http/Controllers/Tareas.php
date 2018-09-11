<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tarea;
use App\Autor;
use App\Etiqueta;

class Tareas extends Controller
{
    protected $tareas;

    public function __construct()
    {
        // $this->middleware('auth', [
        //     'except' => ['listar']
        // ]);

        $this->middleware('auth');
    }


    public function listar()
    {
        //$tareas = Tarea::all(); //ESTO NO ES EAGER LOADING
        //$tareas = Tarea::with('autor')->get(); //ESTO ES EAGER LOADING
        $tareas = Tarea::with('autor')->paginate(2);
        //comando de artisan para publicar una vista de html que viene embebida en el framework
        //php artisan vendor:publish

        //dd($tareas);

        //$tareas = $tareas->sortBy('descripcion');

    	return view('tareas.lista', compact('tareas'));
    }


    public function verDetalle(Tarea $tarea)
    {
    	//$tarea = Tarea::findOrFail($tarea);

        $autor = $tarea->autor;
        $etiquetas = Etiqueta::orderBy('nombre')->get();
        return view('tareas.detalle', compact('tarea', 'autor', 'etiquetas'));

    }

    public function crear()
    {
        $tarea = new Tarea;
        $autores = Autor::all();
        return view('tareas.crear', compact('tarea', 'autores'));
    }

    public function guardar(Request $request)
    {

        $this->validate(
            $request,
            [
                'descripcion' => 'required|max:20',
                'id_autor' => 'required|exists:autores,id'
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
        //$autor->tareas()->save($tarea);
        $tarea->save();

        return redirect('/tareas');
    }

    public function editar(Tarea $tarea)
    {
        $autores = Autor::all();
        return view('tareas.editar', compact('tarea', 'autores'));
    }

    public function actualizar(Tarea $tarea, Request $request)
    {
        $this->validate(
            $request,
            [
                'descripcion' => 'required|max:20',
                'id_autor' => 'required|exists:autores,id'
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

    public function quitarEtiqueta(Tarea $tarea, Etiqueta $etiqueta)
    {
        $tarea->etiquetas()->detach($etiqueta);
        return back();
    }

    public function agregarEtiqueta(Tarea $tarea, Request $request)
    {
        $etiqueta = Etiqueta::findOrFail($request->input('id_etiqueta'));

        if(!$tarea->etiquetas()->find($etiqueta->id)) {
            $tarea->etiquetas()->attach($etiqueta);    
        }

        return back();
    }
}
