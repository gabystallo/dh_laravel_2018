<!DOCTYPE html>
<html>
<head>
	<title>@yield('titulo')</title>
	<link rel="stylesheet" type="text/css" href="/css/estilo.css">
</head>
<body>

	<div class="menu">
		<nav>
			<ul>
				<li><a href="/tareas">Listado de tareas</a></li>
				<li><a href="/tareas/crear">Crear tarea</a></li>
			</ul>
		</nav>
	</div>

	@yield('cuerpo')

</body>
</html>