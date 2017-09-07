@extends('layouts.master')

@section('title')
	<title>View Post</title>
@stop

@section('content')
	<main class="container">
		<h1>{{$post->title}}</h1>
		<p>By {{$post->created_by}}</p>
		<p>{{$post->content}}</p>
		<p>Created: {{$post->created_at}}</p>
		<p>Updated: {{$post->updated_at}}</p>

		@if(Auth::id() == $post->created_by)
			<a href="{{action('PostsController@edit', $post->id)}}">Edit this post</a>
		@endif

	</main>
@stop