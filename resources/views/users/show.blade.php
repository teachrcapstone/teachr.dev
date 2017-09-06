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
				<div class="form-group">
					<a href="{{ action('UsersController@edit', $user->id) }}" class="btn btn-info" role="button">Edit Profile</a>
				</div>
				@endif
			</div>

			<div class="col-sm-6">
				
				<h4>{{ $user->name}}'s Lessons</h4>
				<!-- for each lesson user has, dedicate a sub-section showing the basic info per post (limit 3?) -->

				<h4>{{ $user->name}}'s Posts</h4>
				<!-- for each lesson user has, dedicate a sub-section showing the basic info per post (limit 3?) -->
				<h5>title</h5>
				<p>content</p>
				<p>category</p>
				<p>created at</p>
				<!-- end foreach. maybe mini pagination or a "view all posts by this user" button -->

			</div>
			
		</div>	



	</main>


@stop
