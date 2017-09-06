@extends('layouts.master')

@section('title')
	<title>Update Your Lesson Plan</title>
@stop

@section('content')

	<main class="container">
		<h1>Update Your Post</h1>
		<form method="POST" action="{{ action('PostsController@update', $post->id) }}">

			{!! csrf_field() !!}

			<div class="form-group">

				<input class="form-control" type="text" name="title" placeholder="Topic" value="{{ $post->title }}">
			</div>

			<div class="form-group">

				<textarea class="form-control" type="textarea" name="content" rows="4" cols="20" value="{{ $post->content }}">{{ $post->content }}</textarea>
			</div>


			<div class="form-group">
				<select name='category' class="form-control">
					<option name="general" value="general">General</option>
					<option name="elementary" value="elementary">Elementary</option>
					<option name="middle" value="middle">Middle</option>
					<option name="high" value="high">High</option>
					<option name="technology" value="technology">Technology</option>
					<option name="management" value="management">Classroom Management</option>
					<option name="admin" value="admin">Administration</option>
					<option name="other" value="other">Other</option>
				</select>
			</div>

			<!-- <p> placeholder for file upload</p> -->

			{{ method_field('PUT')}}

			<button class="btn-success btn" type="submit">Turn in Your Corrections!</button>

		</form>


		<form method="POST" action="{{ action('PostsController@destroy', $post->id) }}">

			{!! csrf_field() !!}

			<button class="btn btn-danger">Delete Post</button>

			{{ method_field('DELETE') }}
			
		</form>
	</main>

@stop
