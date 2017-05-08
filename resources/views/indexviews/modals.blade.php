<style type="text/css">
	#facebook-icon{
		background-image: url("{{asset('public/img/inco-facebook.png')}}");
	}
</style>
<div id="modalSignIn" class="modal modalsignin">
	<div class="modal-content">
	  <div class="row modal-header center-align">
	  	Sign In
	  </div>
	  <div class="row col s10 offset-s1 info-container">
		  <div class="input-field">
	          <i class="material-icons prefix">account_circle</i>
	          <input type="text" class="validate" id="txtusuario">
	          <label for="txtusuario">Email o Username</label>
	      </div>
   		  <div class="input-field">
	          <i class="material-icons prefix">payment</i>
	          <input type="password" class="validate" id="txtcontrasenia">
	          <label for="txtcontrasenia">Contrasenia</label>
	       </div>
	       
	       <div class="col s12">
	       	    <button class="btn-large waves-effect waves-light modal-button" style="width: 100%;" id="signInbtn">Iniciar Session</button>
	       </div>
	       <hr>
	       <div class="col s4 center-align">
	       	<a class="waves-effect waves-light btn" style="background-color: #3b5998; font-size: 20px;" href="{{url('loginSocialiteRedirect/facebook')}}"><i class="fa fa-facebook-official" style="font-size: 1.6rem;"></i></a>
	       </div>
	       <div class="col s4 center-align">
	       	<a class="waves-effect waves-light btn" style="background-color: #00aced; font-size: 20px;" href="{{url('loginSocialiteRedirect/twitter')}}"><i class="fa fa-twitter-square" style="font-size: 1.6rem;"></i></a>
	       </div>
	       <div class="col s4 center-align">
	       	<a class="waves-effect waves-light btn" style="background-color: #d62d20; font-size: 20px;" href="{{url('loginSocialiteRedirect/google')}}" disabled><i class="fa fa-google-plus-square" style="font-size: 1.6rem;"></i></a>
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
	       <div class="col s12">
	       	    <button class="btn-large waves-effect waves-light modal-button" style="width: 100%;" id="signUnbtn">Registrarse y continuar</button>
	       </div>
	       <hr>
	       <div class="col s4 center-align">
	       	<a class="waves-effect waves-light btn" style="background-color: #3b5998; font-size: 20px;" href="{{url('loginSocialiteRedirect/facebook')}}"><i class="fa fa-facebook-official" style="font-size: 1.6rem;"></i></a>
	       </div>
	       <div class="col s4 center-align">
	       	<a class="waves-effect waves-light btn" style="background-color: #00aced; font-size: 20px;" href="{{url('loginSocialiteRedirect/twitter')}}"><i class="fa fa-twitter-square" style="font-size: 1.6rem;"></i></a>
	       </div>
	       <div class="col s4 center-align">
	       	<a class="waves-effect waves-light btn" style="background-color: #d62d20; font-size: 20px;" href="{{url('loginSocialiteRedirect/google')}}" disabled><i class="fa fa-google-plus-square" style="font-size: 1.6rem;"></i></a>
	       </div>
	  </div>
	</div>
</div>
<div id="modalHelp" class="modal">
	<div class="modal-content">
	  <h4>Modal Header</h4>
	  <p>A bunch of text</p>
	</div>
	<div class="modal-footer">
	  <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
	</div>
</div>