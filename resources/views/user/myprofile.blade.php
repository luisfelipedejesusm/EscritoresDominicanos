@extends('layouts.IndexLayout')

@section('content')
<style type="text/css">
	@media only screen and (min-width: 993px) {
		#agregar_libro_btn{
			border-radius: 5px;
			-moz-transition: all 0.2s;
			-webkit-transition: all 0.2s;
			transition: all 0.2s;
		}
		#agregar_libro_btn:hover{
			cursor:pointer;
			background-color: rgba(149,165,166,0.2);
		}
		#image_perfil{
			padding: 30px;
			margin-top: 30px;
			margin-bottom: 0px;
		}	
		.user_info_secundario{
			margin-top: -20px;
			color: #7f8c8d;
		}
		.user_info_secundario p{
			margin:0;
			color: #7f8c8d;
		}
		.user_info_secundario #user_info_nombre{
			font-size: 23px;
			color: #2c3e50;
		}
	}
	@media only screen and (max-width: 992px) {

	}
</style>

<div class="row">
	<div class="row col l3 s12">
		<div class="row col l10 s6 offset-s3 offset-l1" id="image_perfil">
			<img src="{{$user->users_info->foto_url}}" class="responsive-img test" style="border-radius: 5px;">
		</div>
		<div class="row col l10 s6 offset-s3 offset-l1 center-align user_info_secundario">
			<p id="user_info_nombre">{{$user->users_info->nombre}}</p>
			<br>
			<p id="user_info_email">{{$user->email}}</p>
			<p>{{$user->users_info->nacionalidad}}</p>
			<p>{{$user->users_info->telefono}}</p>
		</div>
	</div>
	@if(Auth::user()->user_type == 1)
	<!-- Usuarios normales -->	

	<div class="row col l9 s12" style="margin-top: 70px; padding-left: 50px; padding-right: 50px;">
		<div class="row col l8 s12" style="padding:15px; border-left: 5px solid #2c3e50; font-size:23px; background: linear-gradient(to right, rgba(22,160,133,1) 0%,rgba(23,170,141,1) 34%,rgba(26,188,156,0) 100%); color: white; text-shadow: 1px 1px 2px #2c3e50; font-size: 25px; box-shadow: -2px 1px 1px #2c3e50;">
			Valorados recientemente
		</div>
		<div class="row col l12 s12">
			@foreach($books as $book)
			<div class="col l3 s4" style="padding:20px;">
				<a href="{{url('/bookDetail/'.$book->id)}}">					
					<img src="{{url($book->imgUrl)}}" class="responsive-img" style="box-shadow: -1px 1px 1px #2c3e50;">
				</a>
			</div>
			@endforeach
		</div>
	</div>

	
	@else
	<!-- Usuarios Escritores -->
	<div class="row col l9 s12" style="margin-top: 70px; padding-left: 50px; padding-right: 50px;">
		<!--<div class="col l2 s3 center-align" style="height: 170px; color: #16a085;" id="agregar_libro_btn">
			<i class="material-icons" style="font-size: 70px; line-height: 170px; text-shadow: 0 1px 1px #2c3e50;">present_to_all</i>
		</div>-->
		<div class="col l8 s12">
			<div class="row col l12 s12" style="border-left: 3px solid #16a085; font-size:23px;">
			<p style="margin:0;">{{$user->users_info->nombre}} {{$user->users_info->apellido}}</p>
			</div>
			<div class="row col l12 s12" style="border-left: 3px solid #16a085">
				<p style="word-wrap: break-word; margin:0;">{!! nl2br(e($user->users_info->biografia)) !!}</p>
			</div>
			<div class="row col l12 s12" style="border-left: 3px solid #16a085">
				<p style="word-wrap: break-word; margin:0;">{!! nl2br(e($user->users_info->mas_info)) !!}</p>
			</div>
		</div>
		<div class="col l4 s12">
			<div class="row col l12 s12" style="padding:15px; border-right: 5px solid #2c3e50; font-size:23px; background: linear-gradient(to left, rgba(22,160,133,1) 0%,rgba(23,170,141,1) 34%,rgba(26,188,156,0) 100%); color: white; text-shadow: 1px 1px 2px #2c3e50; font-size: 25px; box-shadow: 2px 1px 1px #2c3e50; text-align: right;">
			Mas Valorado
			</div>
			<div class="row col l10 s10 offset-l1 offset-s1" style="padding: 15px;">
			@foreach($booksAutor as $book)
				<a href="{{url('/bookDetail/'.$book->id)}}">					
					<img src="{{url($book->imgUrl)}}" class="responsive-img" style="box-shadow: -1px 1px 1px #2c3e50;">
				</a>
			@endforeach
			</div>
		</div>
		
	</div>

	@endif
</div>
@endsection