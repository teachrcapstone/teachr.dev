@extends('layouts.master')



@section('title')
	<title>Account Edit Form</title>

@stop


@section('content')
	<main class="container">


		<h1>Edit Your Account</h1>


		<form action="{{ action('UsersController@update' , $user->id) }}" method="POST">

			{!! csrf_field() !!}

			<div class="row">
				<div class="text-center col-centered">
					<img src="https://process.filestackapi.com/resize=w:300,h:300/circle/{{$user->image}}" id="editIcon">

					<div class="container">
						
						<div class="form-group" style="margin-top: 1em;">
				
							<input type="BUTTON"  class="btn" value="Update Profile Picture" id="updateIcon filestackConfirm" onclick="updateIcon()">
						</div>
					</div>
					
				</div>
				
			</div>

			<div class="form-group">
			<label for="Name">Name:</label>
				<input class="form-control" type="text" name="name" value="{{ $user->name }}" placeholder="What do you want to go by?">
				
			</div>

			<div class="form-group">
				<label for="Email">Email:</label>
				<input class="form-control" id="filestack" type="text" name="email" value="{{ $user->email }}" placeholder="We'll send you updates here.">
				<input id="imageEdit" type='hidden' value='{{$user->image}}' name='image'></input>
			</div>

			<div class="form-group">
				<label for="Bio">Bio:</label>
				<textarea rows="4" cols="15" class="form-control" name="bio" value="{{$user->bio}}" placeholder="Say something about yourself!">{{$user->bio}}</textarea>
			</div>


			<button class="btn btn-success">Submit Changes</button>

			{{ method_field('PUT') }}

		</form>

		<form method="POST" action="{{ action('UsersController@destroy', $user->id) }}">

			{!! csrf_field() !!}

			<button class="btn btn-xs btn-link"><h6>Delete Account</h6></button>

			{{ method_field('DELETE') }}
			
		</form>

	</main>
@stop
