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

Route::get('/tareas', 'Tareas@listar');

Route::get('/tareas/crear', 'Tareas@crear');

Route::post('/tareas/crear', 'Tareas@guardar');

Route::get('/tareas/{tarea}/editar', 'Tareas@editar');

Route::put('/tareas/{tarea}/editar', 'Tareas@actualizar');

Route::delete('/tareas/{tarea}/eliminar', 'Tareas@eliminar');

Route::get('/tareas/buscar-por-autor/{autor}', 'Tareas@buscarPorAutor');

Route::get('/tareas/primera', 'Tareas@primera');

Route::get('/tareas/{tarea}/detalle', 'Tareas@verDetalle');





Route::get('/peliculas/listar', 'PeliculasController@listar');


Route::get('/peliculas/{id}', 'PeliculasController@buscarPeliculaId');



Route::get('/peliculas/buscar/{nombre}', 'PeliculasController@buscarPeliculaNombre');




