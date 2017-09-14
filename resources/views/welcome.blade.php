@extends('layouts.master')

@section('title')
	<title>Teachr</title>
	<style type="text/css">

		main {
			padding-top: 3em;
		}

		div.chalk {
			content: url("/img/teachrSplash.png");
			height: 100%;
			max-width: auto;
		}

		footer {
			color: white;
		}
	</style>
@stop

@section('content')

	  <main>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 chalk "></div>
			</div>

			<br>
			@if(!Auth::check())
				<div class="row">
					<div class="col-xs-4 col-xs-offset-2 col-lg-3 col-lg-offset-3 text-center">
						<form action="{{action('Auth\AuthController@getLogin')}}">
							<button class="btn btn-primary btn-md btn-block">login</button>
						</form>
					</div>

					<div class="col-xs-4  col-lg-3  text-center">
						<form action="{{action('Auth\AuthController@getRegister')}}">
							<button class="btn btn-primary btn-md btn-block">signup</button>
						</form>
					</div>
				</div>
			@endif
			<br>
			
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1>What is Teachr?</h1>
					<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
				</div>
			</div>
		</div>

	  </main>     

@stop