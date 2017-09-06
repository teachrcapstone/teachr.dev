@extends('layouts.master')

@section('title')
	<title>Update Your Lesson Plan</title>
@stop

@section('content')
	
	<main class="container">
		<h1>Update Your Lesson Plan</h1>
		<form method="POST" action="{{action('PostsController@update')}}">
			{!! csrf_field() !!}

			<input class="form-control" type="text" name="title" placeholder="Lesson Name..." value="{{old('title')}}">

			<textarea class="form-control" type="textarea" name="content" rows="4" cols="20"> {{old('content')}} </textarea>

			<!-- <p> placeholder for file upload</p> -->

			{{ method_field('POST')}}

			<button class="btn-success btn" type="submit">Turn in Your Corrections!</button>
	</main>

@stop