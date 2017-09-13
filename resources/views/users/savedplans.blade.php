@extends('layouts.master')

@section('title')
	<title>Saved Lessons</title>
@stop

@section('content')

	<main class="container">
		<div class="row">
			<h3><a href="{{ action('UsersController@dashboard') }}">Back to Dashboard</a></h3>
			<h3><a href="{{ action('PlansController@index') }}">View All Plans</a></h3>

			<h2>My Saved Lessons</h2>
			<h4>Total Results: {{ $likedPlans->total() }}</h4>
				@foreach($likedPlans as $plan)
					<a href="{{action('PlansController@show', $plan->id)}}"><h3>{{$plan->name}}</h3></a>
					<p>TEK: {{$plan->tek}}</p>
					<p>Objective: {{$plan->objective}}</p>
					<p>Department: {{$plan->department}}</p>
					<p>Grade Level: {{$plan->grade_level}}</p>
					<a href="{{ action('UsersController@show', $plan->created_by) }}"><p>Created By: {{$plan->user->name}}</p></a>
					<p>Uploaded: {{$plan->created_at}}</p>
					<hr>
				@endforeach

		{!! $likedPlans->render() !!}



		</div>
	</main>
@stop


