<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<form id="form" action="{{url('test2')}}" method="post">
	<div class="info">
		<input type="text" id="val1" class="val1">
		<input type="text" id="val2">		
	</div>
</form>
<a href="#!" class="masbtn">Otro Campo</a>
<button id="submit">submit</button>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript">
	var data = []
	jQuery.extend(jQuery.expr[':'], {
    focusable: function (el, index, selector) {
        return $(el).is('a, button, :input, [tabindex]');
    }
});
	$(document).on('click', '.borrar', function() {
    $(this).parent().remove();
});
		$(document).on('input', '.val1', function() {
			
			var length = $(this).val().length;
			console.log(length);
		    if(length >= 12){
		    	var $canfocus = $(':focusable');
		        var index = $canfocus.index(this) + 1;
		        if (index >= $canfocus.length) index = 0;
		        $canfocus.eq(index).focus();
		    }
		});
	$('.masbtn').on('focus', function(){
				$('#form').append('<div class="info"><a href="#!" class="borrar">x</a><input type="text" id="val1" class="val1"><input type="text" id="val2"></div>');
		var $canfocus = $(':focusable');
		var index = $canfocus.index(this) -2;
        if (index >= $canfocus.length) index = 0;
        $canfocus.eq(index).focus();
	})
	$(document).on('keypress', 'input', function (e) {
    if (e.which == 13) {
        e.preventDefault();
        // Get all focusable elements on the page
        var $canfocus = $(':focusable');
        var index = $canfocus.index(this) + 1;
        if (index >= $canfocus.length) index = 0;
        $canfocus.eq(index).focus();
    }
});
	$('.masbtn').click(function(){

	})
	$('#submit').click(function(){
		$('.info').each(function(i){
			var data2 = {primero : $(this).find('#val1').val(),segundo : $(this).find('#val2').val()}
			data.push(data2);
		})
		$.post( "{{url('/test2')}}", { data: data,'test':'daa', _token : $('meta[name="csrf-token"]').attr('content') } )
		.done(function(data){
			console.log(data.message);
		});
		console.log(data);
	})
</script>
</body>
</html>