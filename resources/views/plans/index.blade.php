@extends('layouts.master')

@section('title')
	<title>Lesson Plans</title>
@stop

@section('content')

	<main class="container">
		@foreach ($plans as $plan)
			<p> {{ $plan->name }} </p>
			<p> {{ $plan->tek }} </p>
			<p> {{ $plan->objective }} </p>
			<p> {{ $plan->department }} </p>
			<p> {{ $plan->grade_level }} </p>
			<p> {{ $plan->content }} </p>
			<p> {{ $plan->file_uploads }} </p>
			<p> {{ $plan->created_by }} </p>
		@endforeach
	</main>
@stop
