@extends('layouts.master')

@section('title')
	<title>User Posts</title>
@stop

@section('content')

	<main class="container">
		<div class="row">
			<h3><a href="{{ action('UsersController@show', Auth::id()) }}">Back to Dashboard</a></h3>



		</div>
	</main>
@stop
