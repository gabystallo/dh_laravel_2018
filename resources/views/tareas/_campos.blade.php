{{ csrf_field() }}

<div>
	<label>Descripción:</label>
	<input type="text" name="descripcion" value="{{ old('descripcion', $tarea->descripcion)}}">
</div>

<div>
	<label>Autor:</label>
	<input type="text" name="autor" value="{{ old('autor', $tarea->autor)}}">
</div>