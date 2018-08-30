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
				<li>
					{{ $etiqueta->nombre }}
					<!-- <a href="{{ route('quitar-etiqueta', ['tarea' => $tarea->id, 'etiqueta' => $etiqueta->id]) }}">x</a> -->
					<a href="{{ route('quitar-etiqueta', compact('tarea', 'etiqueta')) }}">x</a>
				</li>
			@empty
				<li>No hay etiquetas</li>
			@endforelse
		</ul>
		<hr>
		<form method="post" action="{{ route('agregar-etiqueta', compact('tarea')) }}">
			{{ csrf_field() }}
			{{ method_field('put') }}
			<label>Agregar etiqueta</label>
			<select name="id_etiqueta">
				@foreach($etiquetas as $etiqueta)
					<option value="{{ $etiqueta->id }}">{{ $etiqueta->nombre }}</option>
				@endforeach
			</select>
			<button type="submit">Agregar</button>
		</form>
	</div>
@endsection