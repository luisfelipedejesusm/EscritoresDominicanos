@extends('layouts.IndexLayout')

@section('content')
<div class="row col l12 s12">
<div class="col l3 hide-on-med-and-down">
	@include('categorias')
</div>
<div class="col l9 s12">
	<div class="row contenedor" style="margin: 30px;">
	@if(!$books->isEmpty())
		@foreach($books as $book)

		<div class="col l3 s6 libros-busqueda" style="padding: 20px;">			
			<div class="card">
			    <div class="card-image waves-effect waves-block waves-light">
			      <img class="activator" src="{{ url() . $book->imgUrl }}">
			    </div>
			    <div class="card-content">
			      <span class="card-title activator grey-text text-darken-4">{{$book->title}}<i class="material-icons right">more_vert</i></span>		
			      <p>
			      	@foreach($book->tag as $tag)
					<div class="chip hide-on-med-and-down"><a href="{{url('/findBooks/'.$tag->name)}}">{{$tag->name}}</a></div>
					@endforeach
			      </p>	      			      
			    </div>
			    <div class="card-reveal">
			      <span class="card-title grey-text text-darken-4"><a href="{{ url('bookDetail/'. $book->id) }}">{{$book->title}}</a><i class="material-icons right">close</i></span>
			      <p>
			      	<div class="hide-on-med-and-down">
			      		<p>{{$book->descripcion}}</p>
			      	</div>
			      	<div class="nontagchipdiv">
			      		@foreach($book->tag as $tag)
						<div class="hide-on-large-only nochiptag"><a href="{{url('/findBooks/'.$tag->name)}}">{{$tag->name}}</a></div>
						@endforeach
			      	</div>			      	
			      </p>
			    </div>
			  </div>
		</div>
		@endforeach
	@else
		<p>no hay libros</p>
	@endif
	</div>
	<div class="row">		
		<div class="col s6">
			@if($books->currentPage()!=1)
			<a href="{{ $books->previousPageUrl() }}" class="btn-large">anterior</a>
			@endif
		</div>
		<div class="col s6">
			@if($books->hasMorePages())			
			<a href="{{ $books->nextPageUrl() }}" class="btn-large">siguiente</a>	
			@endif
		</div>
	</div>
</div>
</div>


@endsection