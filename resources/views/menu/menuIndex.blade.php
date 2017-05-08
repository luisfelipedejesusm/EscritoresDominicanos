 <nav class="nav-extended" id="nav">
    <div class="nav-wrapper" id="nav-wrapper">
        <div class="hide-on-med-and-down">
          <a href="{{url('/')}}" class="brand-logo" id="logomenu"><i class="material-icons">library_books</i>Escritores Dominicanos</a>          
        </div>
        <div class="hide-on-large-only">
          <a href="{{url('/')}}" class="brand-logo" id="logomenu"><i class="material-icons">library_books</i>E.D.</a>          
        </div>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons" style="text-align: center; font-size: 40px; margin-top: 20px;">menu</i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down ul-topmenu">
        @if(Auth::check())
        <li><a href="{{url('/myprofile')}}" id=""><i class="material-icons">perm_identity</i>Perfil</a></li>
        @if(Auth::user()->user_type==2)
        <li><a href="#!" id=""><i class="material-icons">dashboard</i>Dashboard</a></li>
        <li><a href="#!" id=""><i class="material-icons">library_books</i>Mis Libros</a></li>
        <li><a href="#!" id=""><i class="material-icons">message</i>Mensajes</a></li>
        @endif
        <li><a href="#!" class="signout_btn"><i class="material-icons">power_settings_new</i>Log Out</a></li>
        @else
        <li><a href="#modalSignIn"><i class="material-icons">assignment_ind</i>Sign In</a></li>
        <li><a href="#modalSignUp"><i class="material-icons">supervisor_account</i>Sign Up</a></li>
        <li><a href="#modalHelp"><i class="material-icons">live_help</i>Help</a></li>        
        @endif
      </ul>
      <ul class="side-nav ul-topmenu" id="mobile-demo">
        @if(Auth::check())
        <li><a href="#!" id=""><i class="material-icons">perm_identity</i>Perfil</a></li>
        @if(Auth::user()->user_type==2)
        <li><a href="#!" id=""><i class="material-icons">dashboard</i>Dashboard</a></li>
        <li><a href="#!" id=""><i class="material-icons">library_books</i>Mis Libros</a></li>
        <li><a href="#!" id=""><i class="material-icons">message</i>Mensajes</a></li>
        @endif
        <li><a href="#!" class="signout_btn"><i class="material-icons">power_settings_new</i>Log Out</a></li>
        @else
        <li><a href="#modalSignIn"><i class="material-icons">assignment_ind</i>Sign In</a></li>
        <li><a href="#modalSignUp"><i class="material-icons">supervisor_account</i>Sign Up</a></li>
        <li><a href="#modalHelp"><i class="material-icons">live_help</i>Help</a></li>        
        @endif
      </ul>
    </div>
    @if($busqueda)
    <div class="nav-content">
      <ul class="tabs tabs-transparent">
        <li class="tab"><a href="#home" class="active" id="homeindexbtn">Home</a></li>
        <li class="tab"><a href="#topbooks" id="topbooksindexbtn">Top Books</a></li>
        <li class="tab"><a href="#advancesearch" id="advancesearchindexbtn">Advance Search</a></li>
      </ul>
    </div>

    @else
    <!--<div class="nav-content">
      <ul class="tabs tabs-transparent">
        <li class="tab disabled"><a href="#home" class="active" id="homeindexbtn">Home</a></li>
        <li class="tab disabled"><a href="#topbooks" id="topbooksindexbtn">Top Books</a></li>
        <li class="tab disabled"><a href="#advancesearch" id="advancesearchindexbtn">Advance Search</a></li>
      </ul>
    </div>    -->
    @endif
  </nav>
  @if(false)<div class="row">
  <div class="col l8 s8 offset-s1 offset-l1">
    <input type="text" style="background-color: white; color: black; padding:10px;margin: 0 !important; width: 100% !important; border:none !important;">
  </div>
    <div class="col l2 s2">
      <button class="btn btn-large" style="height: 60px !important; margin-top: 5px;">asdas</button>
    </div>
  </div>
      
@endif
@section('customScripts')

<script type="text/javascript">
  $('.signout_btn').click(function(){
          $('.loader').show();

      $.ajax({
      type : 'Post',
      data: {
        _token: '{{csrf_token()}}' 
      },
      url : '/FinalProject/usuario/logout',
      dataType: 'Json',
      success : function(data){
        if(data.message == 'success'){
          document.location.href="{{url('/')}}";
        }else{
          $('.loader').fadeOut();
          Materialize.toast('Error al autenticar al usuario. Revise su usuario o contrasenia', 4000, 'rounded');
        }     
      }
    })
        })

</script>

@endsection