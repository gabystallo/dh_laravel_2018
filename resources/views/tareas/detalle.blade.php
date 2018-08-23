@extends('layout')

@section('cuerpo')
	<h1>Detalle de una tarea</h1>
	<div>
		<strong>Descripción: </strong> {{ $tarea->descripcion }}
	</div>
	<div>
		<strong>Autor: </strong> {{ $tarea->autor }}
	</div>
@endsection