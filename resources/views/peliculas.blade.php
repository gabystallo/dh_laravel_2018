<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h1>Peliculas</h1>

	@forelse($peliculas as $pelicula)
		<div>{{ $pelicula }}</div>
	@empty
		<div>No hay películas</div>
	@endforelse

</body>
</html>