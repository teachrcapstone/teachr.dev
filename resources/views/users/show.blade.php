@extends('layouts.master')

@section('title')
	<title>User Account</title>
	<style type="text/css">
		.profile{
			margin-top: 50px;
		}
		.img-responsive{
			margin: 0 auto;
		}

	</style>
@stop



@section('content')
	<main class="container">
		<div class="col-sm-4 col-sm-offset-1 text-center">
			<div class="row profile">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="well shadow-z-1">
							<div class="row">
								<div class="col-sm-2 col-sm-offset-9">
									@if($user->id !== Auth::id())
										@if(Auth::user()->isFollowing($user->id))
											<div class="form-group">
												<a href="{{ action('UsersController@unfollow', $user->id) }}" class="btn btn-danger btn-xs" role="button">Unfollow</a>
											</div>
										@else
											<div class="form-group">
												<a href="{{ action('UsersController@follow', $user->id) }}" class="btn btn-danger btn-xs " role="button">Follow</a>
											</div>
										@endif
									@endif
								</div>	
							</div>	

							<img class="img-responsive" src="https://process.filestackapi.com/resize=w:250,h:250/circle/{{$user->image}}">
							@if($user->id == Auth::id())
								<h2> {{$user->name}} <a href="{{ action('UsersController@edit', $user->id) }}" class="small"><i class="glyphicon glyphicon-pencil" alt="Edit Your Profile"></i></a></h2>
							@else
								<h2> <strong>{{ $user->name }} </strong></h2>		
							@endif

							@if(!empty($user->bio))
								<div>
									<h4><em>{{$user->bio}}</em></h4>
								</div>
							@endif
							<a href="mailto:{{$user->email}}"><h5>Email: {{$user->email}}</h5></a>
							<h5>Member Since: {{$user->created_at }}</h5>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="panel panel-default">
					<div class="panel-heading text-center">
						<a href="" type="button"  data-toggle="modal" data-target="#followerModal" ><strong>{{ $followers->count()}} Followers</strong></a>
					</div>

					<div class="panel-body">
						<div class="row">
							<?php $count = 0; ?>
							@foreach($followers as $follower)
								<?php if($count == 6) break; ?>
								<div class="col-sm-4">
									<a href="{{ action('UsersController@show', $follower->id) }}">
										<img src="https://process.filestackapi.com/resize=w:80,h:80/circle/{{$follower->image}}" style="padding: 3px;">
									</a>
									<?php $count++; ?>
								</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="panel panel-default">
					<div class="panel-heading text-center">
						<a href="" type="button" data-toggle="modal" data-target="#followingModal"><strong> {{ $followings->count() }} Following</strong></a>
					</div>
					<div class="panel-body">
						<div class="row">
							<?php $count = 0; ?>
							@foreach($followings as $following)
								<?php if($count == 6) break; ?>
								<div class="col-sm-4">
									<a href="{{ action('UsersController@show', $following->id) }}">
										<img src="https://process.filestackapi.com/resize=w:80,h:80/circle/{{$following->image}}" style="padding: 3px;">
									</a>
									<?php $count++; ?>
								</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>		<!-- end of left col -->

		<div class="col-sm-5 col-sm-offset-1 text-center profile">
			<div class="row">
				<div class="panel panel-default">
					<div class="panel-heading text-center">
						<a href=""><h2><strong>{{$user->name}}'s Lessons</strong></h2></a>
					</div>
					<div class="panel-body">
						<div class="row text-left">
							<div class="col-sm-12">
								@foreach($userPlans as $plan)
									<a href="{{action('PlansController@show', $plan->id)}}"><h3>{{$plan->name}}</h3></a>
									<p>Created: {{$plan->created_at}}</p>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="panel panel-default">
					<div class="panel-heading text-center">
						<a href=""><h2><strong>{{$user->name}}'s Posts</strong></h2></a>
					</div>
					<div class="panel-body">
						<div class="row text-left">
							<div class="col-sm-12">
								@foreach($userPosts as $post)
									<h4>
										<a href="{{action('PostsController@show', $post->id)}}"><strong>{{$post->title}}</strong></a>
										<p><small>{{$post->created_at}}</small></p>
									</h4>
									<blockquote>{{$post->content}}</blockquote>
									<p><hr></p>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>





<!-- 				@if($user->id == Auth::id())
					<a href="#" class="btn btn-info" role="button">My Lesson Plans</a>
					<a href="{{ action('PlansController@create') }}" class="btn btn-info" role="button">Add Lesson</a>
				@endif


				@if($user->id == Auth::id())
					<a href="{{ action('UsersController@myPosts') }}" class="btn btn-info" role="button">My Posts</a>
					<a href="{{ action('PostsController@create') }}" class="btn btn-info" role="button">Add Post</a>
				@endif -->
			</div>

		</div> <!-- End of right col -->

<!-- 		<div class="row">
			<div class="col-sm-2 col-sm-offset-2 text-center">
				@if($user->id !== Auth::id())
					@if(Auth::user()->isFollowing($user->id))
						<div class="form-group">
							<a href="{{ action('UsersController@unfollow', $user->id) }}" class="btn btn-info btn-md btn-block" role="button">Unfollow</a>
						</div>
					@else
						<div class="form-group">
							<a href="{{ action('UsersController@follow', $user->id) }}" class="btn btn-info btn-xs " role="button">Follow</a>
						</div>
					@endif
				@endif
			</div>	
		</div>	
 -->

<!-- 
			<div class="row">
				<div class="text-center col-centered">

					@if($user->id == Auth::id())
						<h2> {{$user->name}} <a href="{{ action('UsersController@edit', $user->id) }}" class="small"><i class="glyphicon glyphicon-pencil" alt="Edit Your Profile"></i></a></h2>
					@else
						<h2>  {{ $user->name }}</h2>		
					@endif

					<img src="https://process.filestackapi.com/resize=w:300,h:300/circle/{{$user->image}}">
					<h6>Email: {{$user->email}}</h6>
					<h6>Member Since: {{$user->created_at }}</h6>

					@if($user->id !== Auth::id())

						@if(Auth::user()->isFollowing($user->id))
							<div class="form-group">
								<a href="{{ action('UsersController@unfollow', $user->id) }}" class="btn btn-primary btn-xs" role="button">Unfollow this User</a>
							</div>
						@else
							<div class="form-group">
								<a href="{{ action('UsersController@follow', $user->id) }}" class="btn btn-primary btn-xs" role="button">Follow this User</a>
							</div>
						@endif
					@endif
					
				</div>
			</div> -->
				
<!-- 				@if(!empty($user->bio))
					<div>
						<div class="panel panel-success">
							<div class="panel-heading">Biography</div>
							<div class="panel-body">
								{{$user->bio}}
							</div>
						</div>
					</div>
				@endif -->

<!-- 			<div class="row margin-bottom-30">
			<div class="col-sm-12 text-center">

				<button type="button"  data-toggle="modal" data-target="#followingModal">{{ $followings->count()}} Following</button>
 -->
	
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

				<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#followerModal">{{ $followers->count()}} Followers</button> -->

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


			</div>


			
		</div>	



	</main>


@stop
