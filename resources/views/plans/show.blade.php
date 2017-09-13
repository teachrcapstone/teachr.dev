@extends('layouts.master')

@section('title')
	<title>View Post</title>
@stop

@section('content')
	<style media="screen">
		.lesson-tab{
			margin-right:0;
		}
	</style>
	<main class="">
		<div class="col-sm-4 col-md-4 col-lg-3">
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

			@if (Auth::id() == $plan->created_by)

				<a href="{{ action('PlansController@edit', $plan->id) }}" class='btn btn-default btn-xs'">Edit this plan</a>

			@elseif (!Auth::user()->hasFavorited($plan))

				<a href="{{ action('PlansController@copy', $plan->id) }}" class='btn btn-default btn-xs'>Copy Plan</a>

			@endif






			@if(Auth::user()->hasLiked($plan))
				<div class="form-control">
					<a href="{{ action('PlansController@unlike', $plan->id )}}" class="btn btn-primary btn-xs">Unlike This Post</a>
				</div>
			@else
				<div class="form-control">
					<a href="{{ action('PlansController@like', $plan->id )}}" class="btn btn-primary btn-xs">Like This Post</a>
				</div>
			@endif


		</div>
		<div class="col-sm-8 col-md-8 col-lg-9">
			<div class="lesson-tab container container-fluid">

				<div class="panel panel-info">
					<ul  class="nav nav-tabs panel-body">
						<li class="active">
							<a  href="#1a" data-toggle="tab">Lesson</a>
						</li>
						<li>
							<a href="#2a" data-toggle="tab">Original File</a>
						</li>
					</ul>
				<div>
					<div class="tab-content">

						<div class='tab-pane active' id="1a">
							<p>{!! Purifier::clean($plan->content, 'settings') !!}</p>
						</div>
						<div class="tab-pane" id="2a">
							@if(!empty($plan->file_uploads))

							<a href="https://cdn.filestackcontent.com/{{$plan->file_uploads}}" target="_blank">Download Lesson Plan</a>
							<br>
							@endif


							@if(!empty($plan->file_uploads))
								<div>

									<iframe src="https://process.filestackapi.com/output=f:pdf/{{$plan->file_uploads}}" width='50%' height='550' class="embed-responsive-item" allowfullscreen></iframe>

								</div>
							@endif
						</div>
					</div>
				</div>
				</div>

			</div>
		</div>

	</main>
@stop
