@extends('layout')

@section('cuerpo')
	<h1>Detalle de una tarea</h1>
	<div>
		<strong>Descripción: </strong> {{ $tarea->descripcion }}
	</div>
	<div>
		<strong>Autor: </strong> {{ $autor->nombre }}
	</div>
	<div>
		<strong>Etiquetas: </strong>
		<ul>
			@forelse($tarea->etiquetas as $etiqueta)
				<li>{{ $etiqueta->nombre }}</li>
			@empty
				<li>No hay etiquetas</li>
			@endforelse
		</ul>
	</div>
@endsection