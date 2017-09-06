@extends('layouts.master')

@section('title')
	<title>Create a Lesson Plan</title>
@stop

@section('content')

	<main class="container">
		<h1>Create a Forum Post</h1>
		<form method="POST" action="{{action('PostsController@store')}}">
			{!! csrf_field() !!}

			<input class="form-control" type="text" name="title" placeholder="Discussion Topic or Question" value="{{old('title')}}">

			<textarea class="form-control" type="textarea" name="content" rows="4" cols="20"> {{old('content')}} </textarea>

			<select name='category' class="form-control">
				<option name="general" value="general">General</option>
				<option name="elementary" value="elementary">Elementary</option>
				<option name="middle" value="middle">Middle</option>
				<option name="high" value="high">High</option>
				<option name="technology" value="technology">Technology</option>
				<option name="management" value="management">Classroom Management</option>
				<option name="admin" value="admin">Administration</option>
				<option name="random" value="random">Random</option>
			</select>

			{{ method_field('POST')}}

			<button class="btn-success btn" type="submit">Submit</button>
	</main>

@stop
