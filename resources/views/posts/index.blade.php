@extends('layouts.master')

@include('layouts.partials._categorynav')

@section('title')
	<title>Discussion Topics</title>
@stop

@section('content')

	<main class="container">
		<div class="row">
			<h3><a href="{{ action('PostsController@index') }}">Back to Categories</a></h3>

			<h1>Viewing "{{ $category }}" Posts</h1>

		 @if($posts->count() == 0)

		 	<h3>Sorry, no results found.</h3>

		 @else

		 <h3>Total Results: {{ $posts->total() }}</h3>

			@foreach($posts as $post)
				<h3><a href="{{ action('PostsController@show', $post->id) }}">{{$post->title}}</a></h3>
				<p>Content: {{$post->content}}</p>
<!-- 				<p>Category: {{$post->category}}</p>
 -->

				@if(Auth::check())
					<a href="{{ action('UsersController@show', $post->created_by)}}"><p>Created By: {{$post->user->name}}</p></a>
				@else 
					<p>Created By: {{$post->user->name}}</p>
				@endif

				<p>Created at: {{ $post->created_at }}</p>
				<hr>
			@endforeach
			
		@endif

			{!! $posts->appends(Input::all())->render() !!}


		</div>
	</main>
@stop
