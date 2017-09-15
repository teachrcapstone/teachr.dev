	@extends('layouts.master')

@section('title')
	<title>User Dashboard</title>
	<style type="text/css">

		main {
			padding-top: 3em;
		}
		.im{
			color: white;
			font-size: 12px;

		}


	</style>
@stop

@section('content')
	<main class="container">
		<div class="row">
			<div class="col-sm-10">
				<h1> Welcome, {{ $user->name }}	<a href="{{ action('UsersController@edit', $user->id) }}" class="small"><i class="glyphicon glyphicon-pencil"></i></a></h1>

				<br>

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

			<div class="col-sm-2">
				<a href="{{ action('UsersController@show' , Auth::id()) }}"><img class="img-responsive" src="https://process.filestackapi.com/resize=w:300,h:300/circle/{{$user->image}}"></a>
			</div>

		</div>

		<br>

		<div class="row">
			<div class="col-sm-5">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Recent Activity</h3>
					</div>

					<div class="panel-body">  
						@foreach($followingsPosts as $post)
							<div class="well shadow-z-1">
								<div class="media">
									<div class="media-left">
										<img src="https://process.filestackapi.com/resize=w:300,h:300/circle/{{$post->user->image}}" class="media-object" style="width:60px">
									</div>
									
									<div class="media-body">
										<h5 class="media-heading">
											<a href="{{ action('UsersController@show', $following->id) }}"><strong>{{$post->user->name}}</strong></a>
											<p><small>{{$post->created_at}}</small></p>
										</h5>
										<h3>
											<a href="{{action('PostsController@show', $post->id)}}">{{$post->title}}</a>	
<!-- 											<p>{{$post->content}}</p>
 -->									</h3>							
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>

			<div class="col-sm-7">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>
							<span>My Lessons</span> 
							<div class="actions pull-right">
								<a class="im" href="#" class="btn"><i class="glyphicon glyphicon-search"></i>View My Lessons </a>
								<a class="im" href="{{ action('PlansController@create') }}" class="btn"><i class="glyphicon glyphicon-plus"></i>Add Lesson</a>
							</div>
						</h3>
					</div>

					<div class="panel-body">  
						<div class="well shadow-z-1">
							@foreach($userPlans as $plan)
								<h4>
									<a href="{{action('PlansController@show', $plan->id)}}"><strong>{{$plan->name}}</strong></a>
								<!-- <p>Objective: {{$plan->objective}}</p> -->
									<p><small> {{$plan->created_at}}</small></p>
								</h4>
								<p>Objective: {{$plan->objective}}</p>
								<hr>

							@endforeach
						</div>
					</div>
				</div>
			
			
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>
							<span>My Posts</span> 
							<div class="actions pull-right">
								<a class="im" href="{{ action('UsersController@myPosts') }}" class="btn"><i class="glyphicon glyphicon-search"></i>View My Posts </a>
								<a class="im" href="{{ action('PostsController@create') }}" class="btn"><i class="glyphicon glyphicon-plus"></i>Add Post</a>
							</div>
						</h3>
					</div>

					<div class="panel-body">  
						<div class="well shadow-z-1">
							@foreach($userPosts as $post)
								<h4>
									<a href="{{action('PostsController@show', $post->id)}}"><strong>{{$post->title}}</strong></a>
									<p><small> {{$post->created_at}}</small></p>
								</h4>
								<hr>
							@endforeach
						</div>
					</div>
				</div>
	
	
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>
							<span>Saved Lessons</span> 
							<div class="actions pull-right">
								<a class="im" href="{{action('UsersController@savedPlans')}}" class="btn"><i class="glyphicon glyphicon-search"></i>View All Saved Lessons</a>
							</div>
						</h3>
					</div>

					<div class="panel-body">  
						<div class="well shadow-z-1">
							@foreach($likedPlans as $plan)
								<h4>
									<a href="{{ action('PlansController@show', $plan->id)}} "><strong>{{$plan->name}}</strong></a>
									<p><small> {{$plan->created_at}}</small></p>
								</h4>
								<div class="row">
									<div class="col-sm-4">
										<strong>Department:</strong> {{$plan->department}}
									</div>
									<div class="col-sm-4">
										<strong>Grade Level:</strong> {{$plan->grade_level}}
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">		
										<strong>Objective:</strong> {{$plan->objective}}
									</div>
									
								</div>

								<hr>
							@endforeach
						</div>
					</div>
				</div>


			</div>
			
		</div>


	</main>

@stop
