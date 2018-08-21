@extends('layout')

@section('cuerpo')
	<h1>Detalle de una tarea</h1>
	<h2>Hoy es {{ $dia }}</h2>
	Esto sería el detalle de la tarea {{ $tarea }}
@endsection