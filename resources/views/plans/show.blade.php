@extends('layouts.master')

@section('title')
	<title>View Post</title>
@stop

@section('content')
	<main class="container">
		<h1>{{ $plan->title }}</h1>
		<p>By {{ $plan->created_by }}</p>
		<p>{{$plan->content}}</p>
		<p>Created: {{$plan->created_at}}</p>
		<p>Updated: {{$plan->updated_at}}</p>

		<a href="{{action('PlansController@edit', $plan->id)}}">Edit this plan</a>

	</main>
@stop
