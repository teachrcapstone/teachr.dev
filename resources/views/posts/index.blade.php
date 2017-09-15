@extends('layouts.master')

@include('layouts.partials._categorynav')

@section('title')
	<title>Discussion Topics</title>
@stop

@section('content')

	<main class="container">
		<div class="row">
			<h3><a href="{{ action('PostsController@index') }}">Back to Categories</a></h3>

			<h1>Viewing {{ ucfirst($category) }} Posts</h1>
		</div>

		 @if($posts->count() == 0)
		 	<div class="row">
			 	<h3>Sorry, no results found.</h3>
		 	</div>

		 @else

			<div class="row">	 	
				<h3>Total Results: {{ $posts->total() }}</h3>
			</div>

			<br>

			@foreach($posts as $post)
			<div class="row">
				<div class="media" style="margin-left: 20px;">
					<div class="media-left">
						<a href="{{action('UsersController@show',$post->created_by)}}"><img src="https://process.filestackapi.com/resize=w:80,h:80/circle/{{$post->user->image}}" class="media-object"></a>
					</div>

					<div class="media-body">
						<h4 class="media-heading">
							<a href="{{ action('PostsController@show', $post->id) }}"><strong>{{$post->title}}</strong></a>
							<p><small>
								Posted {{ $post->created_at }} by <a href="{{ action('UsersController@show', $post->created_by)}}">{{$post->user->name}}</a>
							 </small></p>
						</h4>
						<blockquote>{{$post->content}}</blockquote>
					</div>
				</div>
			 </div>

			<hr>

			@endforeach
			
		@endif

		{!! $posts->appends(Input::all())->render() !!}

	</main>
@stop
