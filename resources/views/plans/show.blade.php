@extends('layouts.master')

@section('title')
	<title>View Post</title>
@stop

@section('content')
	<main class="container">
		<div class="col-sm-4">
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
			<a href="{{action('PlansController@edit', $plan->id)}}">Edit this plan</a>


			@if(!empty($plan->file_uploads))

			<a href="https://cdn.filestackcontent.com/{{$plan->file_uploads}}" target="_blank">Download Lesson Plan</a>
			<br>
			@endif


			@if(Auth::user()->hasLiked($plan))
				<div class="form-control">
					<a href="{{ action('PlansController@unlike', $plan->id )}}" class="btn btn-primary btn-xs">Unsave This Lesson Plan</a>
				</div>
			@else
				<div class="form-control">
					<a href="{{ action('PlansController@like', $plan->id )}}" class="btn btn-primary btn-xs">Save This Lesson Plan</a>
				</div>
			@endif




			@if(!empty($plan->file_uploads))
				<div>

					<iframe src="https://process.filestackapi.com/output=f:pdf/{{$plan->file_uploads}}" width='100%' height='550' class="embed-responsive-item" allowfullscreen></iframe>

				</div>
			@endif
		</div>
		<div class="col-sm-8">
			<div class="panel panel-info">
				<div class="panel-body">
					<p>{!! Purifier::clean($plan->content) !!}</p>
				</div>
			</div>
		</div>

		@if (!Auth::user()->hasFavorited($plan))
			<a href="{{ action('PlansController@copy', $plan->id) }}" class='btn btn-default btn-xs'>Copy Plan</a>

		@endif
	</main>
@stop
