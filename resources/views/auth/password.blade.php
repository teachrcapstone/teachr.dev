@extends('layouts.master')

@section("title")
	<title>Password Reset Request</title>
@stop

@section('content')

	<main class="container">
		<form method="POST" action="/password/email">
			{!! csrf_field() !!}

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
				<button class="btn btn-success" type="submit">Send Password Reset Link</button>
			</div>
		</form>
	</main>
@stop