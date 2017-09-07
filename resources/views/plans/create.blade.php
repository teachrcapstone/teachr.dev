@extends('layouts.master')

@section('title')
	<title>Create a Lesson Plan</title>
@stop

@section('content')

	<main class="container">
		<h1>Create a Lesson Plan</h1>

		<form method="POST" action="{{action('PlansController@store')}}">

			{!! csrf_field() !!}
			<div class="col-md-5 col-lg-4">
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

				<div class="form-group">
					<input type="BUTTON"  class="btn" value="Upload Lesson Plan" id="updateLesson filestackConfirm" onclick="lessonPlan()">
				<!-- 	<input id="uploadedLesson" type='hidden' value='{{old("file_uploads")}}' name='file_uploads'></input> -->
					<h6>Accepted File Types: .doc, .docx, .pdf</h6>


				</div>
			</div>


			<div class="col-md-7 col-lg-8">
				<textarea class="form-control" type="textarea" name="content" placeholder="Lesson Content" rows="20" cols="20" > {{old('content')}} </textarea>

			

				{{ method_field('POST')}}

				<button class="btn-success btn" type="submit">Create</button>
			</div>
		</form>
	</main>

@stop
