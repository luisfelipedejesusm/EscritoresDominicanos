<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="./usuario/login" method="post">
	<input type="text" name="usuario" value="Usuario1">
	<input type="text" name="contrasenia" value="Usuario1">
	<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
	<input type="submit" value="submit">
</form>
</body>
</html>