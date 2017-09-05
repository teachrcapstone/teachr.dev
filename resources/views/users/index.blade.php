@extends('layouts.master')



@section('title')
	<title>Show ALL Users</title>
@stop

@section('content')
	<main class="container">

		<h1>Display Users</h2>


			@foreach($users as $user)
				<h3><a href="{{ action('UsersController@show', $user->id) }}">{{$user->name}}</a></h3>
				<p>Email: {{$user->email}}</p>
				<p>User ID: {{$user->id}}</p>
				<p>Created at: {{ $user->created_at }}</p>
				<p>Updated at: {{ $user->updated_at }}</p>
				<hr>
			@endforeach




	</main>


@stop

<br>


