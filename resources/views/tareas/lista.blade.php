@extends('layout')

@section('titulo')
	Las tareas pendientes
@endsection

@section('cuerpo')
	<h1>Listado de las tareas</h1>

	<div class="tareas">
		@forelse($tareas as $tarea)
			<div class="tarea">
				{{ $tarea->nombreCompleto() }}
			</div>
		@empty
			<div class="mensaje">
				No hay tareas
			</div>
		@endforelse
		
	</div>
@endsection