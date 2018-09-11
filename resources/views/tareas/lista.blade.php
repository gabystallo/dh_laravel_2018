@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Lista de tareas</div>

                <div class="panel-body">

					<div class="tareas">
						@forelse($tareas as $tarea)
							<div class="tarea">
								{{ $tarea->descripcion }}
								({{ $tarea->autor->nombre }})
								<a href="{{ route('tarea-detalle', compact('tarea')) }}">Ver</a>
								<a href="/tareas/{{ $tarea->id }}/editar">Editar</a>
								<form method="post" action="/tareas/{{ $tarea->id }}/eliminar">
									{{ csrf_field() }}
									{{ method_field('delete') }}
									<button type="submit">Eliminar</button>
								</form>
							</div>
						@empty
							<div class="mensaje">
								No hay tareas
							</div>
						@endforelse

						{{ $tareas->links() }}
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection








