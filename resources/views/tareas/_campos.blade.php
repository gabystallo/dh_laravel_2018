{{ csrf_field() }}

<div>
	<label>Descripción:</label>
	<input type="text" name="descripcion" value="{{ old('descripcion', $tarea->descripcion)}}">
</div>

<div>
	<label>Autor:</label>
	<select name="id_autor">
		@foreach($autores as $autor)
			<option value="{{ $autor->id }}"
				@if($autor->id == old('id_autor', $tarea->id_autor))
					selected
				@endif
				>{{ $autor->nombre }}</option>
		@endforeach
	</select>
</div>