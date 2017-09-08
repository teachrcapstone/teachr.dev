@extends('layouts.master')

@section('title')
	<title>User Account</title>
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
				<p>Member Since: {{$user->created_at }}</p>
				<!-- <p>Updated At: {{$user->updated_at }}</p> -->

				@if($user->id == Auth::id())
				<div class="form-group">
					<a href="{{ action('UsersController@edit', $user->id) }}" class="btn btn-info" role="button">Edit Profile</a>
				</div>
				@endif
			</div>

			<div class="col-sm-6">
				
				<h2>{{ $user->name}}'s Lessons</h2>
				@foreach($userPlans as $plan)
					<a href="{{action('PlansController@show', $plan->id)}}"><h3>{{$plan->name}}</h3></a>
					<p>Created: {{$plan->created_at}}</p>
					<hr>
				@endforeach

				<a href="#" class="btn btn-info" role="button">View All Lesson Plans</a>

				<!-- for each lesson user has, dedicate a sub-section showing the basic info per post (limit 3?) -->

				<h2>My Posts</h2>
				@foreach($userPosts as $posts)
					<a href="{{action('PostsController@show', $posts->id)}}"><h3>{{$posts->title}}</h3></a>
					<p>Created: {{$posts->created_at}}</p>

					<hr>
				@endforeach

				<a href="{{ action('UsersController@myPosts') }}" class="btn btn-info" role="button">View All Posts</a>

			</div>
			
		</div>	



	</main>


@stop
