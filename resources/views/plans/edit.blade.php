@extends('layouts.master')

@section('title')
	<title>Update Your Lesson Plan</title>
@stop

@include('layouts.partials._summernote-style')

@section('content')

	<main class="container">
		<div class="panel panel-info">
		<div class="panel-heading">
			<h1>Update Your Lesson Plan</h1>
		</div>
		<div class="panel-body">
		<form method="POST" action="{{action('PlansController@update', $plan->id)}}">
			{!! csrf_field() !!}
			<div class="col-md-5 col-lg-4">
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
				<div class="form-group">
					<br>
					<input type="BUTTON"  class="btn" value="Update Lesson Plan" id="updateLesson filestackConfirm" onclick="lessonPlan()">
					<input id="uploadedLesson" type='text' value='{{$plan->file_uploads}}' name='file_uploads' hidden></input>
					<h6>Accepted File Types: .doc, .docx, .pdf</h6>
				</div>

				@if(!empty($plan->file_uploads))
					<div>

						<iframe src="https://process.filestackapi.com/output=f:pptx/{{$plan->file_uploads}}" width='100%' height='auto' class="embed-responsive-item" allowfullscreen></iframe>

					</div>
				@endif
					<div>

						<iframe src="https://process.filestackapi.com/output=f:pdf/{{$plan->file_uploads}}" width='100%' height='550' class="embed-responsive-item" allowfullscreen hidden></iframe>

					</div>

			</div>


			<div class="col-md-7 col-lg-8">
				<textarea class="form-control" type="textarea" name="content" rows="4" cols="20" id='wysiwyg'> {{ Purifier::clean($plan->content) }} </textarea>

				{{ method_field('PUT')}}

				<button class="btn-success btn" type="submit">Turn in Your Corrections!</button>
			</div>
		</form>

		<form action="{{ action('PlansController@destroy', $plan->id) }}" method="post">
			{!! csrf_field() !!}

			<button class="btn btn-danger">Delete Plans</button>

			{{ method_field('DELETE') }}
		</form>
		</div>
		</div>
	</main>

@stop
@section('scripts')
	@include('layouts.partials._summernote-js')

	<script type="text/javascript">
	$(document).ready(function() {
		$('#wysiwyg').summernote({
			height: 500,
			toolbar: [
			    // [groupName, [list of button]]
			    ['style', ['bold', 'italic', 'underline', 'clear']],
			    ['font', ['strikethrough', 'superscript', 'subscript']],
			    ['fontsize', ['fontsize']],
			    ['color', ['color']],
			    ['para', ['ul', 'ol']],
				// ['insert', ['picture', 'link', 'video', 'hr']],
				['dropdowns', ['paragraph', 'table', 'height']],
				['link', ['link']]
			  ]
			});
	});
	</script>
@stop
