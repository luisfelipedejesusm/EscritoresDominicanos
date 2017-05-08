<!DOCTYPE html>
<html>
<head>
	<title>Url Exception</title>
</head>
<body>
@if($reason=='auth')
	Esta Pagina solo esta disponible para usuarios registrados. <a href="{{url('/')}}">Volver al inicio</a>
@elseif($reason=='usertype')
	Esta Pagina no esta diponible para su usuario. <a href="{{url('/')}}">Volver al inicio</a>
@endif
</body>
</html>