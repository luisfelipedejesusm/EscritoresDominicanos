@extends('layouts.IndexLayout')

@section('content')
<br>
<br>
	<div class="row">
		<div class="row">
		<div class="row col l7 s12 offset-l1" style="margin-bottom: 0;">
			<div class="col l4 hide-on-med-and-down">
				<img src="{{ url($book->imgUrl) }}" class="responsive-img book-image materialboxed">
			</div>
			<div class="col l8 s12">
				<div class="libro-header">
					<h4 style="margin-bottom: 0; margin-top: 0;">{{ $book->title }}</h4>					
					<div id="rateYo" style="padding-left: 0; margin-left: -3px;" @if(!Auth::check()) onclick="logms()" @endif></div>
					<a href="#!">{{$book->autor}}</a>
				</div>
				<div class="col s10 offset-s1 hide-on-large-only" style="margin-top: 15px;">
					<img src="{{ url($book->imgUrl) }}" class="responsive-img book-image">
				</div>
				<div class="row col s10 offset-s1 hide-on-large-only">
					{{$book->descripcion}}
				</div>

				<div class="row" style="margin-bottom: 0;">
					<div class="col l9 s12 libro-datos">
						<h5>Datos del Libro</h5>
						<p>ISBN : <span style="color: #16a085;">{{$book->id}}</span></p>					
						<p>Nº de paginas : <span style="color: #16a085;">{{$book->cant_hojas}}</span></p>
						<p>Tipo de Encuadernado : <span style="color: #16a085;">{{$book->tipo_encuadernado}}</span></p>
						<p>Editorial : <span style="color: #16a085;"><a href="#!" style="color: inherit; text-shadow: 0 1px 0.3px #2c3e50">{{$book->editora}}</a></span></p>
						<p><a href="#BookDetailModalMap" id="modalmap" style="color: #16a085; text-shadow: 0 1px 0.3px #2c3e50">Donde puedo encontrar este libro</a></p>						
						<div class="tags">
						@foreach($book->tag as $tag)
							<div class="chip">
								<a href="#!"><a href="{{url('/findBooks/'.$tag->name)}}">{{$tag->name}}</a></a>
							</div>
						@endforeach							
						</div>
					</div>
					<div class="col l3 s12 libro-buttons">
						<div class="libro-precio center-align col s6 l12">
							{{$book->precio}}$
						</div>
						<div class="thumbs col s6 l12" style="bottom: 0;">
							<div class="col s6 center-align libro-thumbs">
								<a href="#!" class="tooltipped btnlike" data-position="bottom" data-delay="50" data-tooltip="Like" @if(Auth::check()) onclick="addLike(1);" @else onclick="logms();" @endif><i class="material-icons">thumb_up</i></a>
								<p>{{$book->likes}}</p>
							</div>
							<div class="col s6 center-align libro-thumbs">
								<a href="#!" class="tooltipped btndislike" data-position="bottom" data-delay="50" data-tooltip="Dislike" @if(Auth::check()) onclick="addLike(0);" @else onclick="logms();" @endif><i class="material-icons">thumb_down</i></a>
								<p>{{$book->dislikes}}</p>
							</div>
						</div>
					</div>
				</div>
				
			</div>
			</div>
			
			
			<div class="col l3 s12 libro-autor">
				<div class="autor-info center-align">
					<div class="row">
						<div class="col s4 offset-s4">
							<img src="{{asset('/public/img/profile.png')}}" class="circle responsive-img autor-image">
						</div>						
					</div>					
					<a href="#!">Nombre Autor</a>
					<p style="margin-top: 0;">Ciudad, Pais</p>
					<div class="autor-linea"></div>
					<div class="autor-buttons">
						<a href="#BookDetailModalTelefono" class="btn btnautortelefono waves-effect waves-light">Telefono</a>
						<a href="#BookDetailModalEmail" class="btn btnautormensaje waves-effect waves-light">Mensaje</a>
					</div>					
				</div>
			</div>

			<div class="row col l7 offset-l1 hide-on-med-and-down">{{$book->descripcion}}</div>
		</div>
		
	</div>

	<div id="BookDetailModalTelefono" class="modal modaltelefono">
		<div class="modal-content">
			<div class="row modal-header center-align">
				Telefono
			</div>
			<div class="row col s10 offset-s1 info-container center-align">
				<p>Telefono : 809-555-5555</p>
				<p>Celular : 809-555-5555</p>
			</div>
		</div>
	</div>
	<div id="BookDetailModalEmail" class="modal modalemail">
		<div class="modal-content">
			<div class="row modal-header center-align">
				Enviale un Mensaje!
			</div>
			<div class="row">
				<div class="col l10 s12 offset-l1 info-container">
					<div class="input-field">
			          <input placeholder="Nombre" id="txtnombre" type="text" class="validate">
			          <label for="txtnombre">Nombre</label>
			        </div>
			        <div class="input-field">
			          <input placeholder="Correo Electronico" id="txtcorreo" type="text" class="validate">
			          <label for="txtcorreo">Correo Electronico</label>
			        </div>
			        <div class="input-field">
			          <input placeholder="Numero Telefonico (Opcional)" id="txtnumero" type="number" class="validate">
			          <label for="txtnumero">Numero Telefonico (Ocional)</label>
			        </div>
			        <div class="input-field col l12 s12">
			            <textarea id="txtasunto" class="materialize-textarea" data-length="500"></textarea>
			            <label for="txtasunto">Mensaje</label>
			        </div>
			        <a href="#!" class="btn waves-effect waves-light">Enviar</a>
				</div>
			</div>
		</div>
	</div>
	<div id="BookDetailModalMap" class="modal modalmap">
		<div class="modal-content">
			<div class="row col l10 s12 offset-l1 info-container center-align">
				<div class="row" style="margin:0;">
					<div class="col l4 s12">
						<div class="row mapheader center-align">
							Encuetralo en:
						</div>						
						<div class="row mapcontent">
						@if($book->book_locations->first()!=null)
						@foreach($book->book_locations as $location)
							<div class="col s12 maplocation">
								<div class="mapicon col s3">
									
								</div>
								<div class="col s9 left-align map-text">
									<p id="location_nombre">{{$location->location_name}}</p>
									<p id="location_direccion">{{$location->location_address}}</p>
								</div>	
								<input type="hidden" class="locationcoord" longitude="{{$location->longitude}}" latitude="{{$location->latitude}}">							
							</div>				
						@endforeach
						@else						
							<div class="col s12 maplocationempty">
								<div class="col s9 left-align map-text">
									<p id="location_nombre">No se encontraron locaciones</p>
								</div>								
							</div>
						@endif
						</div>
					</div>
					<div class="col l8 s12">
						<div id="map" style="height: 90%;"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
@endsection
@section('customScripts')
	<script type="text/javascript">
		 $("#rateYo").rateYo({
		    rating: {{$stars}},
		    starWidth: "30px",
		    ratedFill: "#16a085",
		    normalFill: "#95a5a6",
		    maxValue: 5,
		    numStars: 5,
		    precision: 1,
		    @if(!Auth::check()) readOnly: true, @endif
		  });

	</script>

@endsection
<!--
@if($book->book_locations->first()!=null)
						@foreach($book->book_locations as $location)
							<div class="col s12 maplocation">
								<div class="mapicon col s3">
									
								</div>
								<div class="col s9 left-align map-text">
									<p id="location_nombre">Nombre de la locacion</p>
									<p id="location_direccion">Calle Tal no se donde</p>
								</div>								
							</div>
						@endforeach
						@else
							<div class="col s12 maplocation">
								<div class="col s9 left-align map-text">
									<p id="location_nombre">No se encontraron datos</p>
								</div>								
							</div>
						@endif-->