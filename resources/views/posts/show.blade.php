@extends('layouts.master')

@section('title')
	<title>View Post</title>
@stop

@section('content')
	<main class="container">
		<div class="row">

				<h1>{{$post->title}}</h1>
	

		
				@if(Auth::id() == $post->created_by)
					<!-- <a href="{{action('PostsController@edit', $post->id)}}">Edit this post</a> -->

					<a href="{{action('PostsController@edit', $post->id)}}" class="btn btn-danger btn-xs" role="button">Edit This Post</a>
				@endif
				

				
		</div>

		<div class="row">

			<h3>{{$post->content}}</h3>
		</div>

		<div class="row">
			
			<p>Created By: {{$post->user->name}}</p>
			<p>Created: {{$post->created_at}}</p>
			<p>Updated: {{$post->updated_at}}</p>

		</div>


	</main>
@stop

@section('footer')
		@include('layouts.partials._disqus')
@stop
