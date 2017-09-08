@extends('layouts.master')

@section("title")
	<title>Password Reset Form</title>
@stop

@section('content')
	<main class="container">
		<h1>Reset Your Password</h1>

		<form method="POST" action="/password/reset">
			{!! csrf_field() !!}
			<input type="hidden" name="token" value="{{ $token }}">

			@if (count($errors) > 0)
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			@endif

			<div class="form-group">
				Email
				<input class="form-control" type="email" name="email" value="{{ old('email') }}">
			</div>

			<div class="form-group">
				Password
				<input class="form-control" type="password" name="password">
			</div>

			<div class="form-group">
				Confirm Password
				<input class="form-control" type="password" name="password_confirmation">
			</div>

			<div class="form-group">
				<button class="btn btn-success" type="submit">Reset Password</button>
			</div>
		</form>
	</main>

@stop