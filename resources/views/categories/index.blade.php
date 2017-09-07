


@extends('layouts.master')

@section('title')
	<title>Posts - Categories</title>
@stop

@section('content')

	<main class="container">
		<div class="row">
			<h1>Posts Categories</h1>


			<form class="navbar-form" action="{{ action('PostsController@index') }}">

				<button type="submit" name="category" value="all">View All</button>

				<button type="submit" name="category" value="general">General</button>

				<button type="submit" name="category" value="elementary">Elementary School (K-5)</button>

				<button type="submit" name="category" value="3">Middle School (6-8)</button>

				<button type="submit" name="category" value="4">High School (9-12)</button>

				<button type="submit" name="category" value="5">Technology in the Classroom</button>

				<button type="submit" name="category" value="6">High School </button>

				<button type="submit" name="category" value="7">Administration</button>

				<button type="submit" name="category" value="8">Other</button>


			</form>

		</div>
	</main>
@stop



