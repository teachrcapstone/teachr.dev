@extends('layouts.master')

@section('title')
	<title>Show - User Account</title>
@stop

@section('content')
	<main class="container">
		<h2>Profile</h2>

		<br>

		<div class="row">
			<div class="col-sm-6">
				<img src="https://cdn.filestackcontent.com/{{$user->image}}">
				<h4>  {{ $user->name }}</h4>		
				<p>Email: {{$user->email}}</p>
				<p>Created At: {{$user->created_at }}</p>
				<p>Updated At: {{$user->updated_at }}</p>

				@if($user->id == Auth::id())

					<a href="{{ action('UsersController@edit', $user->id) }}" class="btn btn-info" role="button">Edit Profile</a>
				@endif
			</div>

			<div class="col-sm-6">
				
				<h4>{{ $user->name}}'s Lessons</h4>

			</div>
			
		</div>	



	</main>


@stop
