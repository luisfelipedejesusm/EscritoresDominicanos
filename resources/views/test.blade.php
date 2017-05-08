<form action="{{url('/test')}}" method="post">
	{{ csrf_field() }}
	<input type="text" name="val1">
	<input type="text" name="val2">
	<input type="text" name="val3">
	<input type="submit" value="submit">
</form>