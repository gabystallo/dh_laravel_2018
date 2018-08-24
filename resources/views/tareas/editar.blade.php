@extends('layout')

@section('titulo')
	Editar una tarea
@endsection

@section('cuerpo')

<h1>Editar tarea</h1>

<div class="errores">
	@foreach($errors->all() as $error)
		<div class="error">{{ $error }}</div>
	@endforeach
</div>

<form method="post">
	{{ method_field('put') }}

	@include('tareas._campos')

	<div>
		<button type="submit">Guardar</button>
	</div>

</form>

@endsection