<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

	<nav class="nav-extended">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">Tarea8</a>
      @if(Auth::check())
      @if(Auth::user()->user_type == 3)
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="#modalupload">Anadir Foto</a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="#modalupload">Anadir Foto</a></li>
      </ul>
      @endif
      @endif
    </div>    
  </nav>
  <div class="row">
<div class="container masonry-grid" style="margin-top: 50px;">
      @foreach($images as $img)
    <div class="col s6 l4">
      <div class="card">
        <div class="card-image">
          <img src="{{url() . '/public/img/tarea8/' . $img->src}}" class="materialboxed responsive-img">
          <span class="card-title" style="text-shadow: 0 1px 1px black;">{{$img->name}}</span>
          @if(Auth::check())
      	  @if(Auth::user()->user_type == 3)
      	  <form action="{{url('tarea8/borrar')}}" method="post">
      	  {{csrf_field()}}
      	  <input type="hidden" name="id" value="{{$img->id}}">
          <button type="submit" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">delete</i></button>
          </form>
          @endif
          @endif
        </div>
        <div class="card-content">
          <p>{{$img->description}}</p>
        </div>
      </div>
    </div>
      @endforeach
  </div>
</div>
  <div id="modalupload" class="modal">
  <form action="{{url('tarea8/')}}" method="post" enctype="multipart/form-data">
  {{csrf_field()}}
    <div class="modal-content">
      <h4>Seleccione una foto</h4>
      <input type="text" name="img_name" placeholder="Nombre de la Imagen">
      <div class="file-field input-field">
      <div class="btn">
        <span>File</span>
        <input type="file" accept="image/*" name="image">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
      <input type="text" name="img_descripcion" placeholder="Descripcion de la Imagen">
    </div>
    <div class="modal-footer">
      <input type="submit" class=" modal-action modal-close waves-effect waves-green btn-flat" value="Aceptar">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
    </form>
  </div>
           

<script type="text/javascript">
	$(".button-collapse").sideNav();
	$('.modal').modal();
	$(document).ready(function(){
    $('.materialboxed').materialbox();
    var $container = $('.masonry-grid'); // our container
  // init Masonry
  $container.masonry({
    columnWidth: '.col',
    itemSelector: '.col'
  });
  });
</script>
</body>
</html>