@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar tarea</div>

                <div class="panel-body">

                	@if(count($errors)>0)
						<div class="alert alert-danger">
							<ul>
								@foreach($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form method="post">
						{{ method_field('put') }}

						@include('tareas._campos')

						<div>
							<button type="submit">Guardar</button>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection