@extends('layouts.master')

@section('title')
	<title>Discussion Topics</title>
@stop

@section('content')

	<main class="container">
		<div class="row">
			<h1>Posts</h1>


			@foreach($posts as $post)
				<h3><a href="{{ action('PostsController@show', $post->id) }}">{{$post->title}}</a></h3>
				<p>Content: {{$post->content}}</p>
				<p>Category: {{$post->category}}</p>


				@if(Auth::check())
					<a href="{{ action('UsersController@show', $post->created_by)}}"><p>Created By: {{$post->user->name}}</p></a>
				@else 
					<p>Created By: {{$post->user->name}}</p>
				@endif

				<p>Created at: {{ $post->created_at }}</p>
				<hr>
			@endforeach


		</div>
	</main>
@stop
