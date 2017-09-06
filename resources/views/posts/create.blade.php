@extends('layouts.master')

@section('title')
	<title>Create a Lesson Plan</title>
@stop

@section('content')

	<main class="container">
		<h1>Create a Forum Post</h1>
		<form method="POST" action="{{action('PostsController@store')}}">
			{!! csrf_field() !!}

			<input class="form-control" type="text" name="title" placeholder="Topic" value="{{old('title')}}">

			<textarea class="form-control" type="textarea" name="content" rows="4" cols="20"> {{old('content')}} </textarea>

			{{ method_field('POST')}}

			<button class="btn-success btn" type="submit">Submit</button>
	</main>

@stop
