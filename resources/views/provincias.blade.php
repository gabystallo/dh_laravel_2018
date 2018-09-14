<!DOCTYPE html>
<html>
<head>
	<title>Provincias</title>
</head>
<body>

	<h1>Provincias</h1>

	<ul>
		@foreach($provincias['provincias'] as $provincia)
			<li>{{ $provincia['nombre'] }}</li>
		@endforeach
	</ul>

</body>
</html>