@extends('layouts.master')

@section('title')
	<title>User Dashboard</title>
@stop

@section('content')
	<main class="container">
		<h2>My Dashboard</h2>

		<br>

		<div class="row">
			<div class="col-sm-6">
				<img src="https://cdn.filestackcontent.com/{{$user->image}}">
				<h4>  {{ $user->name }}</h4>		

				@if($user->id == Auth::id())
				<div class="form-group">
					<a href="{{ action('UsersController@edit', $user->id) }}" class="btn btn-info btn-xs" role="button">Edit Profile</a>
				</div>
				@endif


				<h3>Followers</h3>
				<hr>


			</div>

			<div class="col-sm-6">
				
				<h2>My Lessons</h2>
				@foreach($userPlans as $plan)
					<a href="{{action('PlansController@show', $plan->id)}}"><h3>{{$plan->name}}</h3></a>
					<p>Created: {{$plan->created_at}}</p>
					<hr>
				@endforeach

				@if($user->id == Auth::id())
					<a href="#" class="btn btn-info" role="button">View My Lesson Plans</a>
					<a href="{{ action('PlansController@create') }}" class="btn btn-info" role="button">Add Lesson</a>
				@endif



				<h2>My Posts</h2>
				@foreach($userPosts as $posts)
					<a href="{{action('PostsController@show', $posts->id)}}"><h3>{{$posts->title}}</h3></a>
					<p>Created: {{$posts->created_at}}</p>

					<hr>
				@endforeach

				@if($user->id == Auth::id())
					<a href="{{ action('UsersController@myPosts') }}" class="btn btn-info" role="button">View My Posts</a>
					<a href="{{ action('PostsController@create') }}" class="btn btn-info" role="button">Add Post</a>
				@endif

			</div>
			
		</div>	



	</main>


@stop
