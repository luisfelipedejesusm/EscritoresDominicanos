@extends('layouts.IndexLayout')

@section('content')

	@include('indexviews.home')
	@include('indexviews.topbooks')
	@include('indexviews.advancesearch')

@endsection

