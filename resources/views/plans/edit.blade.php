@extends('layouts.master')

@section('title')
	<title>Update Your Lesson Plan</title>
@stop

@section('content')

	<main class="container">
		<h1>Update Your Lesson Plan</h1>
		<form method="POST" action="{{action('PlansController@update')}}">
			{!! csrf_field() !!}

			<input class="form-control" type="text" name="name" placeholder="Lesson Name..." value="{{old('title')}}">

			<input type="text" class="form-control" name="objective" placeholder="Objective" value="{{ old('title') }}">


			<input type="text" class="form-control" name="tek" placeholder="TEK" value="{{ old('title') }}">

			<select class="form-control" name="department">
				<option value="" class='list-group-item disabled' disabled selected>Department</option>
				<option value="Math">Math</option>
				<option value="Science">Science</option>
				<option value="English">English</option>
				<option value="Social Studies">Social Studies</option>
			</select>

			<select class="form-control" name="grade_level">
				<option value="" class='list-group-item disabled' disabled selected>Grade Level</option>
				<option value="K">K</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
			</select>

			<textarea class="form-control" type="textarea" name="content" placeholder="Lesson Content" rows="4" cols="20" > {{old('content')}} </textarea>

			<!-- <p> placeholder for file upload</p> -->

			{{ method_field('POST')}}

			<button class="btn-success btn" type="submit">Turn in Your Corrections!</button>

		</form>
	</main>

@stop
