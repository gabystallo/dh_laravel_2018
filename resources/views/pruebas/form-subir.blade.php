@extends('layout')

@section('titulo')
	Subir archivos
@endsection

@section('cuerpo')
	<h1>Subir archivo a laravel</h1>


	<img src="/storage/imagen.jpg" style="max-width:400px;">

	<div class="errores">
		@foreach($errors->all() as $error)
			<div class="error">{{ $error }}</div>
		@endforeach
	</div>
	
	<form method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<p>
			<label>Archivo:</label>
			<input type="file" name="archivo">
		</p>
		<p>
			<button type="submit">Subir</button>
		</p>
	</form>

@endsection








