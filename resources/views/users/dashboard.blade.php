@extends('layouts.master')

@section('title')
	<title>User Dashboard</title>
@stop

@section('content')
	<main class="container">
		<div class="row">
			<h1> Welcome, {{ $user->name }}	<a href="{{ action('UsersController@edit', $user->id) }}" class="small"><i class="glyphicon glyphicon-pencil"></i></a></h1>
		</div>


		<div class="row">
			<div class="col-sm-12 text-center">
				<img src="https://process.filestackapi.com/resize=w:300,h:300/circle/{{$user->image}}">
			</div>
		</div>

<!-- 		<div class="row">
			<div class="col-sm-12 text-center">
				@if($user->id == Auth::id())
				<div class="form-group">
					<a href="{{ action('UsersController@edit', $user->id) }}" class="btn btn-info btn-xs" role="button">Edit Profile</a>
				</div>
				@endif
			</div>
		</div> -->



		<div class="row margin-bottom-30">
			<div class="col-sm-12 text-center">

				<button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#followingModal">{{ $followings->count()}} Following</button>

	
				<div id="followingModal" class="modal fade" role="dialog">
					<div class="modal-dialog">

						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Following</h4>
							</div>

							<div class="modal-body">
								@foreach($followings as $following)
									<a href="{{ action('UsersController@show', $following->id) }}"><h4>{{ $following->name }}</h4></a>
								@endforeach
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>

				<button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#followerModal">{{ $followers->count()}} Followers</button>

				<div id="followerModal" class="modal fade" role="dialog">
					<div class="modal-dialog">

						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Followers</h4>
							</div>

							<div class="modal-body">
								@foreach($followers as $follower)
									<a href="{{ action('UsersController@show', $follower->id) }}"><h4>{{ $follower->name }}</h4></a>
								@endforeach
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			
			</div>	

		</div>



		<div class="row">
			<div class="col-sm-6">
			<hr>
				<h2>Recent Activity</h2>
			<hr>
				@foreach($followingsPosts as $post)
					<a href="{{action('PostsController@show', $post->id)}}"><h3>{{$post->title}}</h3></a>
					<a href="{{ action('UsersController@show', $following->id) }}"><p>Created By: {{$post->user->name}}</p></a>
					<p>Posted: {{$post->created_at}}</p>
					<blockquote><p>{{$post->content}}</p></blockquote>
				@endforeach
				
			</div>

			<div class="col-sm-6">

				<div class="title">
					<h2>
						<hr>
						<span>My Lessons</span> 
						<div class="actions pull-right">
							<a href="#" class="btn">
								<i class="glyphicon glyphicon-search"></i>
								View My Lessons 
							</a>
							<a href="{{ action('PlansController@create') }}" class="btn">
								<i class="glyphicon glyphicon-plus"></i>
								Add Lesson
							</a>
						</div>
					</h2>

					<hr>

				</div>
						
				<div class="body">
					@foreach($userPlans as $plan)
						<a href="{{action('PlansController@show', $plan->id)}}"><h3>{{$plan->name}}</h3></a>
						<p>Objective: {{$plan->objective}}</p>
						<p>Created: {{$plan->created_at}}</p>
					@endforeach
					
				</div>
			
				<div class="title">
					<h2>
						<hr>
						<span>My Posts</span> 
						<div class="actions pull-right">
							<a href="{{ action('UsersController@myPosts') }}" class="btn">
								<i class="glyphicon glyphicon-search"></i>
								View My Posts 
							</a>
							<a href="{{ action('PostsController@create') }}" class="btn">
								<i class="glyphicon glyphicon-plus"></i>
								Add Post
							</a>
						</div>
					</h2>

					<hr>

				</div>		
				<div class="body">
					@foreach($userPosts as $posts)
						<a href="{{action('PostsController@show', $posts->id)}}"><h3>{{$posts->title}}</h3></a>
						<p>Created: {{$posts->created_at}}</p>
					@endforeach
				</div>


				<div class="title">
					<h2>
						<hr>
						<span>Saved Lessons</span> 
						<div class="actions pull-right">
							<a href="#" class="btn">
								<i class="glyphicon glyphicon-search"></i>
								View All Saved Lessons
							</a>
						</div>
					</h2>

					<hr>

				</div>		
				<div class="body">
					@foreach($likedPlans as $plan)
						<a href="{{action('PlansController@show', $plan->id)}}"><h3>{{$plan->name}}</h3></a>
						<p>Objective: {{$plan->objective}}</p>
						<p>Department: {{$plan->department}}</p>
						<p>Grade Level: {{$plan->grade_level}}</p>
					@endforeach
				</div>

			</div>
			
		</div>


	</main>

@stop
