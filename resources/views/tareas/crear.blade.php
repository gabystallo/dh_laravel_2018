@extends('layout')

@section('titulo')
	Crear tarea nueva
@endsection

@section('cuerpo')

<h1>Crear tarea</h1>

<div class="errores">
	@foreach($errors->all() as $error)
		<div class="error">{{ $error }}</div>
	@endforeach
</div>

<form method="post">
	{{ csrf_field() }}
	<div>
		<label>Descripción:</label>
		<input type="text" name="descripcion">
	</div>

	<div>
		<label>Autor:</label>
		<input type="text" name="autor">
	</div>

	<div>
		<button type="submit">Crear</button>
	</div>

</form>

@endsection