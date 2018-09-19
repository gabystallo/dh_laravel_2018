<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/pruebas/colecciones', 'Pruebas@colecciones');
Route::get('/pruebas/subir', 'Pruebas@mostrarFormSubir');
Route::post('/pruebas/subir', 'Pruebas@subir');

Route::get('/pruebas/api/consultar', 'Pruebas@consultarApi');
Route::get('/pruebas/api/consultar/con/variables', 'Pruebas@consultarApiConVariables');


Route::get('/tareas', 'Tareas@listar');

Route::get('/tareas/crear', 'Tareas@crear');

Route::post('/tareas/crear', 'Tareas@guardar');

Route::get('/tareas/{tarea}/editar', 'Tareas@editar');

Route::put('/tareas/{tarea}/editar', 'Tareas@actualizar');

Route::delete('/tareas/{tarea}/eliminar', 'Tareas@eliminar');

Route::get('/tareas/{tarea}/ver', 'Tareas@verDetalle')->name('tarea-detalle');

Route::get('/tareas/por-autor/{autor}', 'Tareas@porAutor');

Route::get('/tareas/{tarea}/quitar-etiqueta/{etiqueta}', 'Tareas@quitarEtiqueta')->name('quitar-etiqueta');

Route::put('/tareas/{tarea}/agregar-etiqueta', 'Tareas@agregarEtiqueta')->name('agregar-etiqueta');






Route::get('/peliculas/listar', 'PeliculasController@listar');

Route::get('/peliculas/{id}', 'PeliculasController@buscarPeliculaId');

Route::get('/peliculas/buscar/{nombre}', 'PeliculasController@buscarPeliculaNombre');





Auth::routes();
