@extends('layouts.master')

@section('title')
	<title>View Post</title>
@stop

@section('content')
	<main class="container">
		<div class="col-sm-6">
			<h1>{{ $plan->title }}</h1>
			<p>By {{ $plan->created_by }}</p>
			<p>{{$plan->content}}</p>
			<p>Created: {{$plan->created_at}}</p>
			<p>Updated: {{$plan->updated_at}}</p>
			

			@if(isset($plan->file_uploads))
			<a href="https://cdn.filestackcontent.com/{{$plan->file_uploads}}" target="_blank">Download Lesson Plan</a>
			<br>
			@endif

			<a href="{{action('PlansController@edit', $plan->id)}}">Edit this plan</a>
			
		</div>

		<div class="col-sm-6">
			<iframe src="https://process.filestackapi.com/output=f:pdf/{{$plan->file_uploads}}" width='389' height='550' class="embed-responsive-item" allowfullscreen"></iframe>
			
		</div>


	</main>
@stop
