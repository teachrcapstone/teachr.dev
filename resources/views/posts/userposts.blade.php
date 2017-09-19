@extends('layouts.master')

@section('title')
	<title>User Posts</title>
@stop

@section('content')

	<main class="container">
		<div class="row">
			<h3><a href="{{ action('UsersController@dashboard') }}">Back to Dashboard</a></h3>
			<h3><a href="{{ action('PostsController@index') }}">View All Posts</a></h3>

			<h2>My Posts</h2>
			<h4>Total Results: {{ $userPosts->total() }}</h4>
				@foreach($userPosts as $post)
					<h3>
						<a href="{{action('PostsController@show', $post->id)}}">{{$post->title}}</a>
						<p><small>Created: {{$post->created_at}}</small></p>
					</h3>
					<p>{{$post->content }}</p>

					<hr>
				@endforeach

		{!! $userPosts->render() !!}



		</div>
	</main>
@stop


