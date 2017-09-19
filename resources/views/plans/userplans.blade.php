@extends('layouts.master')

@section('title')
	<title>User Plans</title>
@stop

@section('content')

	<main class="container">
		<div class="row">
			<h3><a href="{{ action('UsersController@dashboard') }}">Back to Dashboard</a></h3>
			<h2>My Plans</h2>
			<h4>Total Results: {{ $userPlans->total() }}</h4>
				@foreach($userPlans as $plan)
					<h3>
						<a href="{{ action('PlansController@show', $plan->id) }}">{{ $plan->name }}</a>
						<p><small>Created: {{ $plan->created_at }}</small></p>
					</h3>
					<p><strong>Department:</strong> {{$plan->department}}</p>
					<p><strong>Grade Level:</strong> {{$plan->grade_level}}</p>
					<p><strong>Objective:</strong> {{$plan->objective}}</p>
					<hr>
				@endforeach

		{!! $userPlans->render() !!}



		</div>
	</main>
@stop


