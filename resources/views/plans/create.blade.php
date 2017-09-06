@extends('layouts.master')

@section('title')
	<title>Create a Lesson Plan</title>
@stop

@section('content')
	
	<main class="container">
		<h1>Create a Lesson Plan</h1>
		<form method="POST" action="{{action('PostsController@store')}}">
			{!! csrf_field() !!}

			<input class="form-control" type="text" name="title" placeholder="Lesson Name..." value="{{old('title')}}">

			<textarea class="form-control" type="textarea" name="content" rows="4" cols="20"> {{old('content')}} </textarea>

			<div class="form-group">
	
				<input type="BUTTON" class="btn" value="update icon..." id="lessonPlan" onclick="lessonPlan()">
			</div>

			{{ method_field('POST')}}

			<button class="btn-success btn" type="submit">Submit for Grading!</button>
	</main>

@stop