@extends('layouts.master')

@section('title')
	<title>View Post</title>
@stop

@section('content')
	{{-- <span><a onclick='history.back(-1)'></a><i class="glyphicon glyphicon-menu-left"></i>Back</a></span> --}}
	<main class="container container-fluid">
		{{-- <div class="col-sm-4 col-md-4 col-lg-3">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h1>{{ $plan->name }}</h1>

				</div>
				<div class="panel-body">
					<p>By {{ $plan->user->name }}</p>
					<strong>Objective:</strong> <p>{{ $plan->objective }}</p>
					<div class="col-sm-2 col-md-2 col-lg-2">
						<strong>TEK:</strong> <p> {{ $plan->tek }}</p>
					</div>
					<div class="col-sm-2 col-md-2 col-lg-2">
						<strong>Subject:</strong><p> {{ $plan->department }}</p>
					</div>
					<div class="col-sm-2 col-md-2 col-lg-2">
						<strong>Grade:</strong><p> {{ $plan->grade_level }}</p>
					</div>

				</div>
				<div class="panel-footer">
					<p>Created: {{ $plan->created_at }} Updated: {{ $plan->updated_at }}</p>
				</div>
			</div>

			@if(Auth::user()->hasLiked($plan))
				<div class="form-control">
					<a href="{{ action('PlansController@unlike', $plan->id )}}" class="btn btn-primary btn-xs">Unsave This Lesson Plan</a>
				</div>
			@else
				<div class="form-control">
					<a href="{{ action('PlansController@like', $plan->id )}}" class="btn btn-primary btn-xs">Save This Lesson Plan</a>
				</div>
			@endif


		</div> --}}
		<div {{--class="col-sm-8 col-md-8 col-lg-9"--}}>
			<div class="lesson-tab">
				<div class="panel panel-default box-shadow">
					<div class="panel-heading">
						<div class='text-right'>
							@if (isset($original))
							<a href="{{action('PlansController@show', $original->id)}}">Original Plan</a> by <a href="{{action('UsersController@show', $original->user->id)}}">{{ $original->user->name }}</a>
							@endif
						</div>
						<div class='h1 text-primary'>{{ $plan->name }}<span class='h4'> By <a href="{{ action('UsersController@show', $plan->created_by) }}">{{ $plan->user->name }}</a></span></div>
						<hr>
						<div class="h4">Objective: <span class="h5">{{ $plan->objective }}</span></div>
						<ul class="list-inline">
							<li>
								<div class="h6">Subject: <span>{{ $plan->department }}</span></div>
							</li>
							<li>
								<div class="h6">Grade: <span> {{ $plan->grade_level }}</span></div>
							</li>
							<li>
								<div class="h6">TEK: <span> {{ $plan->tek }}</span></div>
							</li>
						</ul>

					</div>

					<ul  class="nav nav-tabs">
						<li class="active">
							<a  href="#1a" data-toggle="tab">Lesson</a>
						</li>
						@if (!empty($plan->file_uploads))
							<li>
								<a href="#2a" data-toggle="tab">Original File</a>
							</li>
						@endif
						<div class="text-right">
							<span>
								@if(Auth::user()->hasLiked($plan))
									<a href="{{ action('PlansController@unlike', $plan->id )}}" class="btn btn-sm btn-success"> <span class="glyphicon glyphicon-star"></span>Unsave</a>
								@else
									<a href="{{ action('PlansController@like', $plan->id )}}" class="btn btn-sm btn-success"> <span class="glyphicon glyphicon-star"></span>Save</a>
								@endif
							</span>
							<span class='text-center'>
								@if (Auth::id() == $plan->created_by)

									<a href="{{ action('PlansController@edit', $plan->id) }}" class='btn btn-sm btn-warning'>Edit <i class="glyphicon glyphicon-pencil"></i></a>

								@elseif (!Auth::user()->hasFavorited($plan))

									<a href="{{ action('PlansController@copy', $plan->id) }}" class='btn btn-sm btn-warning'><span class='glyphicon glyphicon-duplicate'></span> Copy</a>

								@endif
							</span>
						</div>
					</ul>
				{{-- <div> --}}
					<div class="tab-content">
						<div class='tab-pane active' id="1a">
							<div class="lesson-content hidden-xs hidden-sm">
								<p>{!! Purifier::clean($plan->content, 'settings') !!}</p>
							</div>
							<div class="container-fluid hidden-lg hidden-md">
								<p>{!! Purifier::clean($plan->content, 'settings') !!}</p>
							</div>
							<div class="panel-footer">
								<ul class="list-inline">
									<li>
										<span class="h5">Created: <span class="h6">{{ $plan->created_at }}</span></span>
									</li>
									<li class='text-right'>
										<span class="h5">Updated: <span class="h6">{{ $plan->updated_at }}</span></span>
									</li>
								</ul>
							</div>
						</div>

						<div class="tab-pane" id="2a">
							@if(!empty($plan->file_uploads))

							<a href="https://cdn.filestackcontent.com/{{$plan->file_uploads}}" target="_blank">Download Lesson Plan</a>
							<br>
							@endif


							@if(!empty($plan->file_uploads))
								<div>

									<iframe src="https://process.filestackapi.com/output=f:pdf/{{$plan->file_uploads}}" width='90%' height='550' class="embed-responsive-item" allowfullscreen></iframe>

								</div>
							@endif
							<div class="panel-footer">
								<ul class="list-inline">
									<li>
										<span class="h5">Created: <span class="h6">{{ $plan->created_at }}</span></span>
									</li>
									<li class='text-right'>
										<span class="h5">Updated: <span class="h6">{{ $plan->updated_at }}</span></span>
									</li>
								</ul>
							</div>
						</div>
					</div>
				{{-- </div> --}}
				</div>

			</div>
		</div>
	</main>
@stop
