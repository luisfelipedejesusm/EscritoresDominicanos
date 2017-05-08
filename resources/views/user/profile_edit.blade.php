@extends('layouts.IndexLayout')
@section('content')
	
	<div class="row">
		<div class="col l10 s12 offset-l1" style="padding: 0;">

		<div class="searchbox row">
          <div class="row searchbox-header center-align">
              Complete sus datos personales
          </div>
          <form method="post" action="{{url('/myprofile/editprofile')}}" id="form_edit_profile" enctype="multipart/form-data">
          <div class="row searchbox-body" style="margin-bottom: 0; padding-bottom: 0;">
            <div class="col s12 l10 offset-l1">
              <div class="input-field col s12 l5 offset-l1">
                <input id="nombre" type="text" class="validate" placeholder="Nombre" name="nombre">
                <label for="nombre">Nombre</label>
              </div>
              <div class="input-field col s12 l5">
                <input id="Apellido" type="text" class="validate" placeholder="Apellido" name="Apellido">
                <label for="Apellido">Apellido</label>
              </div>              
              <div class="file-field input-field col s12 l10 offset-l1">
	            <div class="btn">
		          <span>Foto</span>
			      <input type="file" name="foto_url" accept="image/*">
			    </div>
			    <div class="file-path-wrapper">
			      <input class="file-path validate" type="text">
			    </div>
			  </div>
              <div class="input-field col s12 l10 offset-l1">			  
				  <p>
			        <input type="checkbox" class="filled-in" id="escritor_checkbox" name="soy_escritor" />
			        <label for="escritor_checkbox">Soy un escritor</label>
			      </p>
		      </div>
            </div>
           	<div class="col s12 l10 offset-l1 line"></div>
           	<div id="autor_divinfo">
            <div class="col l10 s12 offset-l1">
              <div class="input-field col l10 s12 offset-l1">
                <input id="Cedula" type="text" class="validate" placeholder="XXX-XXXXXXX-X" name="Cedula">
                <label for="Cedula">Cedula</label>
              </div>
              <div class="input-field col l10 s12 offset-l1">
                <input id="Nacionalidad" type="text" value="Dominicano/a" readonly="readonly" placeholder="Nacionalidad" name="nacionalidad" >
                <label for="Nacionalidad">Nacionalidad</label>
              </div>
              <div class="input-field col l10 s12 offset-l1">
                <input id="PResidencia" type="text" class="validate" placeholder="Pais de Residencia" name="PResidencia">
                <label for="PResidencia">Pais de Residencia</label>
              </div>
              <div class="input-field col l10 s12 offset-l1">
                    <input type="date" class="datepicker" id="fechaNac" name="fechaNac">
                    <label for="fechaNac">Fecha de Nacimiento</label>
                  </div>
              </div>
           	<div class="col s12 l10 offset-l1 line"></div>
              
              <!--
              <div class="col s10 offset-s1">
                  <div class="input-field col s6">
                    <input type="date" class="datepicker" id="DateFrom" name="dateeditionfrom">
                    <label for="DateFrom">Desde Fecha Edicion</label>
                  </div>
                  <div class="input-field col s6">
                    <input type="date" class="datepicker" id="DateTo" name="dateeditionto">
                    <label for="DateTo">Hasta Fecha Edicion</label>
                  </div>
              </div>
              <div class="col s10 offset-s1">
                  <div class="input-field col s6">
                    <input id="Precio desde" type="number" class="validate" placeholder="Precio desde" name="preciodesde">
                    <label for="Precio desde">Precio desde</label>
                  </div>
                  <div class="input-field col s6">
                    <input id="Precio hasta" type="number" class="validate" placeholder="Precio hasta" name="preciohasta">
                    <label for="Precio hasta">Precio hasta</label>
                  </div>
              </div>  -->
            <div class="col l10 s12 offset-l1">
              <div class="input-field col s12 l10 offset-l1">
	            <textarea id="Biografia" class="materialize-textarea" name="Biografia" data-length="500"></textarea>
	            <label for="Biografia">Biografia</label>
	          </div>
	          <div class="input-field col s12 l10 offset-l1">
	            <textarea id="Hobbies" class="materialize-textarea" name="Hobbies" data-length="250"></textarea>
	            <label for="Hobbies">Mis Hobbies</label>
	          </div>
            </div>
           	<div class="col s12 l10 offset-l1 line"></div>
            <div class="col l10 s12 offset-l1">
              <div class="input-field col l5 s6 offset-l1">
                <input id="Telefono" type="text" class="validate" placeholder="Telefono" name="Telefono">
                <label for="Telefono">Telefono</label>
              </div>
              <div class="input-field col l5 s6 offset-l1">
                <input id="Telefono2" type="text" class="validate" placeholder="Telefono 2 (Opcional)" name="Telefono2">
                <label for="Telefono2">Telefono 2 (Opcional)</label>
              </div>     
              <div class="input-field col l5 s6 offset-l1">
                <input id="Celular" type="text" class="validate" placeholder="Celular (Opcional)" name="Celular">
                <label for="Celular">Celular (Opcional)</label>
              </div>
              <div class="input-field col l5 s6 offset-l1">
                <input id="Celular2" type="text" class="validate" placeholder="Celular 2 (Opcional)" name="Celular2">
                <label for="Celular2">Celular 2 (Opcional)</label>
              </div>
              <div class="input-field col s12 l10 offset-l1" style="margin-bottom: 14px;">			  
				  <p>
			        <input type="checkbox" class="filled-in" id="terminosycondiciones" />
			        <label for="terminosycondiciones">Acepto los <a href="#!">Terminos y Condiciones de Servicio</a></label>
			      </p>
		      </div>           
            </div> 
            <div class="col s12 l10 offset-l1 line"></div> 
            </div>
            <div class="col s10 offset-s1">
            	{{csrf_field()}}
              <button class="btn-large waves-effect waves-light" style="width: 100%; margin-bottom: 20px;" id="btn_fillInfo_continuar">Continuar</button>
              <p style="color: red; margin: 10px;" hidden id="error_text">Debe llenar todos los campos</p>
              @if($errors->any())
              <p style="color: red; margin: 10px;" hidden id="error_text">{{$errors->first()}}</p>
            	@endif
           </div>          
            
          </div>
          
          </form>
      </div>
			
		</div>
	</div>

@endsection
@section('customScripts')
<script type="text/javascript">
$(document).ready(function(){
	$('#btn_fillInfo_continuar').click(function(){
		$('#form_edit_profile').submit(function(event){
      if ($('#nombre').val()=='' || $('#Apellido').val()==''){
        $('#error_text').attr('hidden',false);
        return false;
      }
      if ($('#escritor_checkbox').is(':checked')) {
        if ($('#Cedula').val()=='' || $('#PResidencia').val()=='' || $('#Biografia').val()=='' || $('#Biografia').val()=='' || $('#Telefono').val()=='' || $('#fechaNac').val()=='') {
          $('#error_text').attr('hidden',false);
          return false;
        }
      }
      return;
    });
	})
})
</script>
@endsection
