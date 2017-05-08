<!DOCTYPE html>
<html>
<head>
  <title>Tarea 9</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="{{ asset('public/css/IndexNav.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('public/css/modals.css') }}" rel="stylesheet" type="text/css" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <style type="text/css">
    nav .brand-logo {
      font-size: 3.5rem !important;
    }
    .loader{
  background-color: white;
  position: fixed;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  z-index: 9999;  
}
.loader-body{
  height: 30vw !important;
  width: 30vw !important;
  left: 35%;
  position: fixed;
}
@media only screen and (max-width: 992px) {
  
  .loader-body{
    height: 50vw !important;
    width: 50vw !important;
    left: 25%;
    position: fixed;
  }

}
.loader-text{
  position: absolute;
  top: 53%;
  left: 44%;
  font-size: 30px;
  color: #27ae60;
  text-shadow: 0px 1px 2px #2c3e50;
}
  </style>
</head>
<body>

    <div class="loader valign-wrapper ">
        <div class="preloader-wrapper big active loader-body valign ">
            <div class="spinner-layer spinner-blue-only">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>

    </div>
    <div class="back">  
    </div>

   <nav class="nav-extended" id="nav">
    <div class="nav-wrapper" id="nav-wrapper" style="height: 130px;">
        <div class="hide-on-med-and-down">
          <a href="{{url('/tarea9_home')}}" class="brand-logo" style="margin-left: 20px; margin-top: 40px;">Tarea 9</a>          
        </div>
        <div class="hide-on-large-only">
          <a href="{{url('/tarea9_home')}}" class="brand-logo" id="logomenu">Tarea 9</a>     
        </div>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons" style="text-align: center; font-size: 40px; margin-top: 20px;">menu</i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down ul-topmenu">
        @if(Auth::check())
        @if(Auth::user()->user_type==4)
        <li><a href="{{url('/tarea9_perfil')}}" id=""><i class="material-icons">dashboard</i>Muro</a></li>
        <li><a href="{{url('/tarea9_perfil')}}" id=""><i class="material-icons">perm_identity</i>Perfil</a></li>
        <li><a href="#!" class="signout_btn"><i class="material-icons">power_settings_new</i>Log Out</a></li>
        @endif
        @else
        <li><a href="#modalSignIn"><i class="material-icons">assignment_ind</i>Sign In</a></li>
        <li><a href="#modalSignUp"><i class="material-icons">supervisor_account</i>Sign Up</a></li>
        @endif
      </ul>
      <ul class="side-nav ul-topmenu" id="mobile-demo">
        @if(Auth::check())
        <li><a href="{{url('/tarea9_perfil')}}" id=""><i class="material-icons">dashboard</i>Muro</a></li>
        <li><a href="{{url('/tarea9_perfil')}}" id=""><i class="material-icons">perm_identity</i>Perfil</a></li>
        <li><a href="#!" class="signout_btn"><i class="material-icons">power_settings_new</i>Log Out</a></li>
        @else
        <li><a href="#modalSignIn"><i class="material-icons">assignment_ind</i>Sign In</a></li>
        <li><a href="#modalSignUp"><i class="material-icons">supervisor_account</i>Sign Up</a></li>
        @endif
      </ul>
    </div>    
  </nav>

  @if(Auth::check())
  @if(Auth::user()->user_type==4)

    @yield('content')

  @endif
  @else

    <div class="row">
      <div class="col l4 s12 offset-l4" style="margin-top: 50px;">
        <img src="{{asset('public/img/tarea9/imgfondo.png')}}" class="responsive-img">
      </div>
    </div>

  
  @endif

  <div id="modalSignIn" class="modal modalsignin">
  <div class="modal-content">
    <div class="row modal-header center-align">
      Sign In
    </div>
    <div class="col s10 offset-s1 info-container">
      <div class="input-field">
            <i class="material-icons prefix">account_circle</i>
            <input type="text" class="validate" id="txtusuario">
            <label for="txtusuario">Usuario</label>
        </div>
        <div class="input-field">
            <i class="material-icons prefix">payment</i>
            <input type="password" class="validate" id="txtcontrasenia">
            <label for="txtcontrasenia">Contrasenia</label>
         </div>
         <div class="">
              <button class="btn-large waves-effect waves-light modal-button" style="width: 100%;" id="signInbtn">Iniciar Session</button>
         </div>
    </div>
  </div>
</div>

<div id="modalSignUp" class="modal">
  <div class="modal-content">
    <div class="row modal-header center-align">
      Sign Up
    </div>
    <div class="row col s10 offset-s1 info-container">
      <div class="input-field">
            <i class="material-icons prefix">account_circle</i>
            <input type="text" class="validate" id="txtusuariosignup">
            <label for="txtusuario">Nombre de Usuario</label>
        </div>
        <div class="input-field">
            <i class="material-icons prefix">email</i>
            <input type="email" class="validate" id="txtcorreosignup">
            <label for="txtusuario">Correo Electronico</label>
        </div>
        <div class="input-field">
            <i class="material-icons prefix">payment</i>
            <input type="password" class="validate" id="txtpasswordsignup">
            <label for="txtcontrasenia">Contrasenia</label>
         </div>
         <div class="input-field">
            <i class="material-icons prefix">payment</i>
            <input type="password" class="validate" id="txtrepeatpasswordsignup">
            <label for="txtcontrasenia">Repita la Contrasenia</label>
         </div>
         <div class="">
              <button class="btn-large waves-effect waves-light modal-button" style="width: 100%;" id="signUnbtn">Registrarse y continuar</button>
         </div>
    </div>
  </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
<script type="text/javascript">
  $('.modal').modal();
  $(window).on('load',function(){
      $('.loader').fadeOut();
    });
  $(document).ready(function(){
    $(".button-collapse").sideNav();
    $('#signInbtn').click(function(){
      $('.loader').show();

      $.ajax({
      type : 'Post',
      data: {
        _token: '{{csrf_token()}}', 
        usuario: $('#txtusuario').val(),
        contrasenia: $('#txtcontrasenia').val()
      },
      url : '/FinalProject/usuario/login',
      dataType: 'Json',
      success : function(data){
        if(data.message == 'success'){
          location.reload();
        }else if(data.message == 'contrasenia'){
          $('.loader').fadeOut();
          Materialize.toast('Contrasenia Incorrecta', 4000, 'rounded');
        }else if(data.message == 'usuario'){
          $('.loader').fadeOut();
          Materialize.toast('Usuario incorrecto o no ha sido verificado', 4000, 'rounded');          
        }else{
          $('.loader').fadeOut();
          Materialize.toast('Hubo un problema con el servidor', 4000, 'rounded');
        }            
      },
      error: function (jqXHR, exception) {
          console.log(jqXHR.responseText);
        }
    })
    })

$('#signUnbtn').click(function(){
          $('.loader').show();


          if ($('#txtusuariosignup').val()!='' && $('#txtcorreosignup').val()!='' && $('#txtrepeatpasswordsignup').val()!='' && $('#txtpasswordsignup').val()!='') {
            if($('#txtpasswordsignup').val() == $('#txtrepeatpasswordsignup').val()){

                  $.ajax({
                    type : 'Post',
                    data: {
                      _token: '{{csrf_token()}}', 
                      usuario: $('#txtusuariosignup').val(),
                      correo: $('#txtcorreosignup').val(),
                      contrasenia: $('#txtpasswordsignup').val(),
                      type:'4'
                    },
                    url : '/FinalProject/usuario/register',
                    dataType: 'Json',
                    success : function(data){
                      if(data.message == 'success'){
                        $('.loader').fadeOut();                        
                        Materialize.toast('Se ha enviado un correo de verificacion a ' + $('#txtcorreosignup').val(), 4000, 'rounded');
                      }else{
                        $('.loader').fadeOut();
                        Materialize.toast('Error al registrar al usuario ' + data.message + '. Revise su usuario o contrasenia', 4000, 'rounded');
                        console.log(data);
                      }
                    },
                      error: function (jqXHR, exception) {
                        console.log(jqXHR.responseText);
                      }    
                  })

          }else{
            $('.loader').fadeOut();
              Materialize.toast('Las contrasenias no son iguales', 4000, 'rounded');
          }

        }else{
          $('.loader').fadeOut();
          Materialize.toast('Complete todo los campos', 4000, 'rounded');
        }


    })














  })
</script>
@yield('customScripts')
</body>
</html>