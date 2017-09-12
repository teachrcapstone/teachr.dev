@extends('layouts.master')

@section('title')
	<title>User Account</title>
@stop

@section('content')
	<main class="container">
		<h2>Profile</h2>

		<br>

		<div class="row">
			<div class="col-sm-6">
				<img src="https://process.filestackapi.com/resize=w:300,h:300/circle/{{$user->image}}">
				<h2>  {{ $user->name }}</h2>		
				<p>Email: {{$user->email}}</p>
				<p>Member Since: {{$user->created_at }}</p>
				<!-- <p>Updated At: {{$user->updated_at }}</p> -->
				@if($user->id == Auth::id())
				<div class="form-group">
					<a href="{{ action('UsersController@edit', $user->id) }}" class="btn btn-info btn-xs" role="button">Edit Profile</a>
				</div>
				@endif

				<h3>Followers</h3>

				@if($user->id !== Auth::id())

					@if(Auth::user()->isFollowing($user->id))
						<div class="form-group">
							<a href="{{ action('UsersController@unfollow', $user->id) }}" class="btn btn-primary btn-xs" role="button">Unfollow</a>
						</div>
					@else
						<div class="form-group">
							<a href="{{ action('UsersController@follow', $user->id) }}" class="btn btn-primary btn-xs" role="button">Follow</a>
						</div>
					@endif

				@endif
		
				<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#followerModal">{{ $followers->count()}} Followers</button>

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


				<hr>

				<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#followingModal">{{ $followings->count()}} Following</button>

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



			</div>

			<div class="col-sm-6">
				
				<h2>{{ $user->name}}'s Lessons</h2>
				@foreach($userPlans as $plan)
					<a href="{{action('PlansController@show', $plan->id)}}"><h3>{{$plan->name}}</h3></a>
					<p>Created: {{$plan->created_at}}</p>
					<hr>
				@endforeach

				@if($user->id == Auth::id())
					<a href="#" class="btn btn-info" role="button">My Lesson Plans</a>
					<a href="{{ action('PlansController@create') }}" class="btn btn-info" role="button">Add Lesson</a>
				@endif



				<h2>{{ $user->name}}'s Posts</h2>
				@foreach($userPosts as $posts)
					<a href="{{action('PostsController@show', $posts->id)}}"><h3>{{$posts->title}}</h3></a>
					<p>Created: {{$posts->created_at}}</p>

					<hr>
				@endforeach

				@if($user->id == Auth::id())
					<a href="{{ action('UsersController@myPosts') }}" class="btn btn-info" role="button">My Posts</a>
					<a href="{{ action('PostsController@create') }}" class="btn btn-info" role="button">Add Post</a>
				@endif

			</div>
			
		</div>	



	</main>


@stop
