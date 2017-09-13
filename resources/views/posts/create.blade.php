@extends('layouts.master')

@section('title')
	<title>Create a Post</title>
@stop

@section('content')

	<main class="container">
		<h1>Create a Forum Post</h1>
		<form method="POST" action="{{ action('PostsController@store') }}">
			{!! csrf_field() !!}

			<div class="form-group">
				<input class="form-control" type="text" name="title" placeholder="Discussion Topic or Question" value="{{old('title')}}">
			</div>

			<div class="form-group">
				<textarea class="form-control" type="textarea" name="content" rows="4" cols="20"> {{ old('content') }} </textarea>
			</div>

			<div class="form-group">
				<select name='category' class="form-control">
					<option name="general" value="general">General</option>
					<option name="elementary" value="elementary">Elementary School (K-5)</option>
					<option name="middle" value="middle">Middle School (6-8)</option>
					<option name="high" value="high">High School (9-12)</option>
					<option name="technology" value="technology">Technology</option>
					<option name="management" value="management">Classroom Management</option>
					<option name="admin" value="admin">Administration</option>
					<option name="other" value="other">Other</option>
				</select>
			</div>


			<button class="btn-success btn" type="submit">Submit</button>
		</form>
	</main>

@stop
