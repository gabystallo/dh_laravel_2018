@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Detalle de una tarea</div>

                <div class="panel-body">
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
				</div>
			</div>
		</div>
	</div>
</div>
@endsection