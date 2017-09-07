@extends('layouts.master')

@section('title')
	<title>Update Your Lesson Plan</title>
@stop

@section('content')

	<main class="container">
		<h1>Update Your Lesson Plan</h1>
		<form method="POST" action="{{action('PlansController@update', $plan->id)}}">
			{!! csrf_field() !!}

			<input class="form-control" type="text" name="name" placeholder="Lesson Name..." value="{{ $plan->name }}">

			<input type="text" class="form-control" name="objective" placeholder="Objective" value="{{ $plan->objective }}">


			<input type="text" class="form-control" name="tek" placeholder="TEK" value="{{ $plan->tek }}">

			<select class="form-control" name="department">
				<option value="" class='list-group-item disabled' disabled selected>Department</option>
				<option value="Math" {{ $plan->department == "Math" ? "selected" : null }} >Math</option>
				<option value="Science" {{ $plan->department == "Science" ? "selected" : null }}>Science</option>
				<option value="English" {{ $plan->department == "English" ? "selected" : null }}>English</option>
				<option value="Social Studies" {{ $plan->department == "Social Studies" ? "selected" : null }}>Social Studies</option>
			</select>

			<select class="form-control" name="grade_level">
				<option value="" class='list-group-item disabled' disabled selected>Grade Level</option>
				<option value="K" {{ $plan->grade_level == "K" ? "selected" : null }} >K</option>
				<option value="1" {{ $plan->grade_level == "1" ? "selected" : null }}>1</option>
				<option value="2" {{ $plan->grade_level == "2" ? "selected" : null }}>2</option>
				<option value="3" {{ $plan->grade_level == "3" ? "selected" : null }}>3</option>
				<option value="4" {{ $plan->grade_level == "4" ? "selected" : null }}>4</option>
				<option value="5" {{ $plan->grade_level == "5" ? "selected" : null }}>5</option>
				<option value="6" {{ $plan->grade_level == "6" ? "selected" : null }}>6</option>
				<option value="7" {{ $plan->grade_level == "7" ? "selected" : null }}>7</option>
				<option value="8" {{ $plan->grade_level == "8" ? "selected" : null }}>8</option>
				<option value="9" {{ $plan->grade_level == "9" ? "selected" : null }}>9</option>
				<option value="10" {{ $plan->grade_level == "10" ? "selected" : null }}>10</option>
				<option value="11" {{ $plan->grade_level == "11" ? "selected" : null }}>11</option>
				<option value="12" {{ $plan->grade_level == "12" ? "selected" : null }}>12</option>
			</select>

			<textarea class="form-control" type="textarea" name="content" placeholder="Lesson Content" rows="4" cols="20" > {{ $plan->content }} </textarea>

			<!-- <p> placeholder for file upload</p> -->

			{{ method_field('PUT')}}

			<button class="btn-success btn" type="submit">Turn in Your Corrections!</button>
		</form>
		<form action="{{ action('PlansController@destroy', $plan->id) }}" method="post">
			{!! csrf_field() !!}

			<button class="btn btn-danger">Delete Plans</button>

			{{ method_field('DELETE') }}
		</form>

	</main>

@stop
