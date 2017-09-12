@extends('layouts.master')

@section('title')
	<title>Teachr Login</title>
@stop

@section('content')

	<main class="container">
		<h1>Teachr Login</h1>

		@if(Session::has('message'))
			<div class="alert alert-danger">
				{!! session('message') !!}
			</div>
		@endif

		<form method="POST" action="/auth/login">
			{!! csrf_field() !!}

			<div class="form-group">
				Email:
				<input class="form-control"  type="email" name="email" value="{{ old('email') }}">
			</div>

			<div class="form-group">
				Password:
				<input class="form-control"  type="password" name="password" id="password">
			</div>

			<div class="form-group">
				<input type="checkbox" name="remember">
				Remember Me
			</div>

			<div>
				<button class="btn btn-success"  type="submit">Login</button>
			</div>
			<div>
				<a href="/password/email">Forgot Password</a>
			</div>
		</form>	
	</main>
@stop