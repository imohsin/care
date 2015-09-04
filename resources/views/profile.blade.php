
@extends('base')

@section('title', 'Profile')

@section('body')

	@if(Auth::check())
		<a href="auth/logout">logout</a>
	@endif

@stop