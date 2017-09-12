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
				<img src="https://process.filestackapi.com/resize=w:300,h:300/circle/{{$user->image}}">
				<h4>  {{ $user->name }}</h4>		

				@if($user->id == Auth::id())
				<div class="form-group">
					<a href="{{ action('UsersController@edit', $user->id) }}" class="btn btn-info btn-xs" role="button">Edit Profile</a>
				</div>
				@endif


		<!-- 		<h3>Followers</h3>
				{{$followers->count()}}
					@foreach($followers as $follower)
						<a href="{{ action('UsersController@show', $follower->id) }}"><h4>{{ $follower->name }}</h4></a>
					@endforeach -->

				<!-- Trigger the modal with a button -->
				<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#followerModal">{{ $followers->count()}} Followers</button>

				<!-- Modal -->
				<div id="followerModal" class="modal fade" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content-->
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


				<hr>

				<!-- <h3>Following</h3> -->
				

				<!-- Trigger the modal with a button -->
				<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#followingModal">{{ $followings->count()}} Following</button>

				<!-- Modal -->
				<div id="followingModal" class="modal fade" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content-->
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

				<div>
				<h2>Recent Activity</h2>
					@foreach($followingsPosts as $post)
						<h4>{{$post->title}}</h4>
						<p>Created By: {{$post->user->name}}</p>
						<h5>{{$post->content}}</h5>
						<p>{{$post->created_at}}</p>
					@endforeach
				</div>



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
