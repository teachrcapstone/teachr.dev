@extends('layouts.master')



@section('title')
	<title>Account Edit Form</title>

@stop


@section('content')
	<main class="container">


		<h1>Edit Account</h1>

		<form action="{{ action('UsersController@update' , $user->id) }}" method="POST">

			{!! csrf_field() !!}

			<input type="BUTTON" class="btn" value="update icon..." id="updateIcon" onclick="updateIcon()">


			<div class="form-group">

				<input class="form-control" type="text" name="name" value="{{ $user->name }}" placeholder="Enter Name">
				
			</div>

			<div class="form-group">
				
				<input class="form-control" type="text" name="email" value="{{ $user->email }}" placeholder="Enter Updated Email">

			</div>


			<button class="btn btn-success">Submit Changes</button>

			{{ method_field('PUT') }}

		</form>

		<form method="POST" action="{{ action('UsersController@destroy', $user->id) }}">

			{!! csrf_field() !!}

			<button class="btn btn-danger">Delete Post</button>

			{{ method_field('DELETE') }}
			
		</form>

	</main>
@stop
