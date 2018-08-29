@extends('layout')

@section('titulo')
	Las tareas pendientes
@endsection

@section('cuerpo')
	<h1>Listado de las tareas</h1>

	<div class="tareas">
		@forelse($tareas as $tarea)
			<div class="tarea">
				{{ $tarea->descripcion }}
				({{ $tarea->autor->nombre }})
				<a href="{{ route('tarea-detalle', compact('tarea')) }}">Ver</a>
				<a href="/tareas/{{ $tarea->id }}/editar">Editar</a>
				<form method="post" action="/tareas/{{ $tarea->id }}/eliminar">
					{{ csrf_field() }}
					{{ method_field('delete') }}
					<button type="submit">Eliminar</button>
				</form>
			</div>
		@empty
			<div class="mensaje">
				No hay tareas
			</div>
		@endforelse
		
	</div>
@endsection