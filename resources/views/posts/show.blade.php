@extends('layouts.master')

@section('title')
	<title>View Post</title>
	<style type="text/css">
		.panel{
			margin-top: 50px;

		}

	</style>
@stop

@section('content')
	<main class="container">
		<div class="row">
			 	<div class="panel panel-default">		

					<div class="panel-body">  

						<div class="media" style="margin-left: 20px;">
							<div class="media-left">
								<a href="{{action('UsersController@show',$post->created_by)}}"><img src="https://process.filestackapi.com/resize=w:80,h:80/circle/{{$post->user->image}}" class="media-object"></a>
							</div>

							<div class="media-body">
								<div class="pull-right">
									
									@if(Auth::id() == $post->created_by)
										<a href="{{action('PostsController@edit', $post->id)}}" class="btn btn-danger btn-xs" role="button">Edit This Post</a>
									@endif
								</div>
								<h4 class="media-heading">
									<strong>{{$post->title}}</strong>
									<p><small>
										Posted {{ $post->created_at }} by <a href="{{ action('UsersController@show', $post->created_by)}}">{{$post->user->name}}</a>
									 </small></p>
								</h4>
								<blockquote>{{$post->content}}</blockquote>
							</div>
						</div>
					</div>
				</div>
	</main>
@stop

@section('footer')
		@include('layouts.partials._disqus')
@stop
