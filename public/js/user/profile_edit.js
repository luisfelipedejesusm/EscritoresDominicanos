$(document).ready(function(){
	$('#autor_divinfo').hide()
        $('#btn_fillInfo_continuar').attr('disabled',false);
})
$('#escritor_checkbox').change(function() {
        if($(this).is(":checked")) {
		$('#autor_divinfo').fadeIn();
                $('#btn_fillInfo_continuar').attr('disabled',true);
        }else{
		$('#autor_divinfo').fadeOut();
                $('#btn_fillInfo_continuar').attr('disabled',false);
        }
});

$('#terminosycondiciones').change(function() {
        if($(this).is(":checked")) {
	       $('#btn_fillInfo_continuar').attr('disabled',false);
        }else{
               $('#btn_fillInfo_continuar').attr('disabled',true);
        }
});
jQuery(function($){
   $("#Cedula").mask("999-9999999-9",{placeholder:'X'});
   $("#Telefono").mask("999-999-9999");
   $("#Telefono2").mask("999-999-9999");
   $("#Celular").mask("999-999-9999");
   $("#Celular2").mask("999-999-9999");
});