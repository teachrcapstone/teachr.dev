


@extends('layouts.master')

@section('title')
	<title>Posts - Categories</title>
@stop

@section('content')

	<main class="container">
		<h1>Posts Categories</h1>


			<form class="navbar-form" action="{{ action('PostsController@index') }}">

				<div class="row">
					<div class="col-xs-12 text-center">
						<button class="btn btn-default" type="submit" name="category" value="all">View All</button>	
					</div>
				</div>

				<br>

				<div class="row">
					<div class="col-xs-6 text-center">
						<button class="btn btn-default" type="submit" name="category" value="general">General</button>
						
					</div>
					
					<div class="col-xs-6 text-center">
						
						<button class="btn btn-default" type="submit" name="category" value="5">Technology</button>
					</div>
				</div>

				<br>

				<div class="row">

					<div class="col-xs-6 text-center">
						<button class="btn btn-default" type="submit" name="category" value="elementary">Elementary School (K-5)</button>		
					</div>
						
					<div class="col-xs-6 text-center">
						<button class="btn btn-default" type="submit" name="category" value="6">Classroom Management </button>	
					</div>
				</div>

				<br>

				<div class="row">

					<div class="col-xs-6 text-center">
						<button class="btn btn-default" type="submit" name="category" value="3">Middle School (6-8)</button>
					</div>

					<div class="col-xs-6 text-center">
						<button class="btn btn-default" type="submit" name="category" value="7">Administration</button>		
					</div>
					
				</div>

				<br>

				<div class="row">
					<div class="col-xs-6 text-center">
						<button class="btn btn-default" type="submit" name="category" value="4">High School (9-12)</button>	
					</div>

					<div class="col-xs-6 text-center">	
						<button class="btn btn-default" type="submit" name="category" value="8">Other</button>
					</div>
					
				</div>

			</form>

	</main>
@stop



