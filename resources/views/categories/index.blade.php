


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
						<button class="btn btn-default btn-block" type="submit" name="category" value="all">View All</button>	
					</div>
				</div>

				<br>

				<div class="row">
					<div class="col-xs-6 text-center">
						<button class="btn btn-default btn-block" type="submit" name="category" value="general">General</button>
						
					</div>
					
					<div class="col-xs-6 text-center">
						
						<button class="btn btn-default btn-block" type="submit" name="category" value="technology">Technology</button>
					</div>
				</div>

				<br>

				<div class="row">

					<div class="col-xs-6 text-center">
						<button class="btn btn-default btn-block" type="submit" name="category" value="elementary">Elementary School (K-5)</button>		
					</div>
						
					<div class="col-xs-6 text-center">
						<button class="btn btn-default btn-block" type="submit" name="category" value="management">Classroom Management </button>	
					</div>
				</div>

				<br>

				<div class="row">

					<div class="col-xs-6 text-center">
						<button class="btn btn-default btn-block" type="submit" name="category" value="middle">Middle School (6-8)</button>
					</div>

					<div class="col-xs-6 text-center">
						<button class="btn btn-default btn-block" type="submit" name="category" value="admin">Administration</button>		
					</div>
					
				</div>

				<br>

				<div class="row">
					<div class="col-xs-6 text-center">
						<button class="btn btn-default btn-block" type="submit" name="category" value="high">High School (9-12)</button>	
					</div>

					<div class="col-xs-6 text-center">	
						<button class="btn btn-default btn-block" type="submit" name="category" value="other">Other</button>
					</div>
					
				</div>

			</form>

	</main>
@stop



