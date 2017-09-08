@extends('layouts.master')

@section('title')
	<title>User Posts</title>
@stop

@section('content')

	<main class="container">
		<div class="row">
			<h3><a href="{{ action('UsersController@show', Auth::id()) }}">Back to Dashboard</a></h3>

			<h2>My Posts</h2>
				@foreach($userPosts as $post)
					<a href="{{action('PostsController@show', $post->id)}}"><h3>{{$post->title}}</h3></a>
					<p>{{$post->content }}</p>
					<p>Created: {{$post->created_at}}</p>

					<hr>
				@endforeach



		</div>
	</main>
@stop
