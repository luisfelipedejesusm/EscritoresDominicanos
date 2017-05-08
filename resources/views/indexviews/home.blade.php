<div id="home">
		<div class="row col s12 l12 m12 img-portada">
			<img src="{{asset('public/img/libroPortada.jpg')}}" style="width:100%;">
		</div>
		<div class="section section-custom">
			<div class="row">
				<form method="get" action="{{url('/findBooks')}}" id="search-form">
				<div id="div-prueba" class="col s11 l8">
					<div class="col s2 l1 search-button">
						<a class="btn-floating btn-large waves-effect waves-light" id="btnhomesearch" href="#!"><i class="material-icons">search</i></a>
					</div>
					<div class="col s10 l11 search-textbox">
						<input type="text" class="input-field" placeholder="Buscar libros, autores, revistas, etc..." id="input_home_search" name="input_home_search">
					</div>
					<input type="hidden" name="tipodebusqueda" value="normal">
				</div>
				</form>
			</div>
			<div class="row col s8 offset-s2 center-align heading-books">
				<h4>Los mas buscados...</h4>
			</div>
			<div class="row col s12" id="libros-div">
				<div class="col l1 valign-wrapper hide-on-med-and-down" id="right-arrow">
					<a class="valign left-arrow"><i class="large material-icons">play_arrow</i></a>
				</div>
				<div class="col l2 offset-l1 hide-on-med-and-down">
					 <div class="card">
					 	<div class="card-image waves-effect waves-block waves-light">
					 	<img class="activator" src="{{ asset('public/img/book.jpg') }}">
					 	</div>
					 	<div class="card-content">
					 		<span class="card-title activator grey-text text-darken-4">Nombre del Libro<i class="material-icons right">more_vert</i></span>
					 		<p><a href="#">Mas Informacion...</a></p>
					 	</div>
					 	<div class="card-reveal">
					 		<span class="card-title grey-text text-darken-4">Nombre del Libro<i class="material-icons right">close</i></span>
					 		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					 		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					 		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					 		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					 		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					 		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					 	</div>
					 </div>
				</div>
				<div class="col l2 s8 offset-s2 offset-l1 libro-medio">
					 <div class="card">
					 	<div class="card-image waves-effect waves-block waves-light">
					 	<img class="activator" src="{{ asset('public/img/book.jpg') }}">
					 	</div>
					 	<div class="card-content">
					 		<span class="card-title activator grey-text text-darken-4">NNombre del Libro<i class="material-icons right">more_vert</i></span>
					 		<p><a href="#">Mas Informacion...</a></p>
					 	</div>
					 	<div class="card-reveal">
					 		<span class="card-title grey-text text-darken-4">Nombre del Libro<i class="material-icons right">close</i></span>
					 		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					 		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					 		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					 		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					 		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					 		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					 	</div>
					 </div>
				</div>
				<div class="col l2 offset-l1 hide-on-med-and-down ">
					 <div class="card">
					 	<div class="card-image waves-effect waves-block waves-light">
					 	<img class="activator" src="{{ asset('public/img/book.jpg') }}">
					 	</div>
					 	<div class="card-content">
					 		<span class="card-title activator grey-text text-darken-4">Nombre del Libro<i class="material-icons right">more_vert</i></span>
					 		<p><a href="#">Mas Informacion...</a></p>
					 	</div>
					 	<div class="card-reveal">
					 		<span class="card-title grey-text text-darken-4">Nombre del Libro<i class="material-icons right">close</i></span>
					 		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					 		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					 		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					 		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					 		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					 		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					 	</div>
					 </div>
				</div>
				<div class="col l1 offset-l1 valign-wrapper hide-on-med-and-down" id="left-arrow">
					<a class="right-arrow valign"><i class="large material-icons">play_arrow</i></a>
				</div>
			</div>
		</div>
		<div class="parallax-container" style="height: 150px;">
    		<div class="parallax"><img src="{{ asset('public/img/libros2.jpg') }}"></div>
  		</div>
  		<div class="section section-custom">
  			<div class="row">
  				@include('categorias')
  				<div class="col l7 hide-on-med-and-down" style="padding-top: 25px; margin-top: 35px;">
  					<img src="{{asset('public/img/img1.png')}}">
  				</div>
  			</div>
  		</div>
  		<div class="parallax-container" style="height: 300px;">
    		<div class="parallax"><img src="{{ asset('public/img/libros3.jpg') }}"></div>
  		</div>





		<div id="overlay"></div>

	</div>
