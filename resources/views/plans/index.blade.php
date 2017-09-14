@extends('layouts.master')

@section('title')
	<title>Lesson Plans</title>
@stop

@section('content')

	<main class="container">
		<h1 class='text-center'>Find Lesson Plans</h1>
		<nav class="col-md-4 col-lg-3">
			<h2>Filter results</h2>
			<ul class="nav nav-stacked">
				{{-- @if ($request->department) --}}
				<form class="" action="{{ action('PlansController@index') }}" method="get">

					<input type="text" name="search" placeholder="Search" method='GET'>

					<li class=''>Department
						<ul>
							<li>
								<input type="radio" id="math"
								name="department" value='math'>
								<label for="math">Math</label>
							</li>
							<li>
								<input type="radio" id="english"
								name="department" value='english'>
									<label for="english">English</label>
							</li>
							<li>
								<input type="radio" id="science"
								name="department" value='science'>
								<label for="science">Science</label>
							</li>
							<li>
								<input type="radio" id="social-studies">
								<label for="social-studies"
								name="department" value='social studies'>Social Studies</label>
							</li>
							<li>
								<input type="radio" id="none">
								<label for="none">None</label>
							</li>
						</ul>

					</li>
					<li class=''> Grade Level
						<ul>
							<li>
								<input type="radio" name="grade_level" value="K" id="gradeK">
								<label for="gradeK">K</label>
							</li>
							<li>
								<input type="radio" id="grade1"
								name='grade_level' value='1'>
								<label for="grade1">1</label>
							</li>
							<li>
								<input type="radio" id="grade2"
								name='grade_level' value='2'>
								<label for="grade2">2</label>
							</li>
							<li>
								<input type="radio" id="grade3"
								name='grade_level' value='3'>
								<label for="grade3">3</label>
							</li>
							<li>
								<input type="radio" id="grade4"
								name='grade_level' value='4'>
								<label for="grade4">4</label>
							</li>
							<li>
								<input type="radio" id="grade5"
								name='grade_level' value='5'>
								<label for="grade5">5</label>
							</li>
							<li>
								<input type="radio" id="grade6"
								name='grade_level' value='6'>
								<label for="grade6">6</label>
							</li>
							<li>
								<input type="radio" id="grade7"
								name='grade_level' value='7'>
								<label for="grade7">7</label>
							</li>
							<li>
								<input type="radio" id="grade8"
								name='grade_level' value='8'>
								<label for="grade8">8</label>
							</li>
							<li>
								<input type="radio" id="grade9"
								name='grade_level' value='9'>
								<label for="grade9">9</label>
							</li>
							<li>
								<input type="radio" id="grade10"
								name='grade_level' value='10'>
								<label for="grade10">10</label>
							</li>
							<li>
								<input type="radio" id="grade11"
								name='grade_level' value='11'>
								<label for="grade11">11</label>
							</li>
							<li>
								<input type="radio" id="grade12"
								name='grade_level' value='12'>
								<label for="grade12">12</label>
							</li>
						</ul>
					</li>

				<button type="submit">Filter</button>
				</form>
			</ul>
		</nav>
		<div class="col-md-8 col-lg-9">
			@foreach ($plans as $plan)
				<div class="panel panel-default">
					<div class="panel-heading">
						<a href="{{ action('PlansController@show', $plan->id) }}"><span class='h4'> {{ $plan->name }} </span>
						<span class='h6'> by {{ $plan->user->name }} </span></a>

					</div>
					<div class="panel-body">
						<p> <span class='h4'>Objective: </span> {{ $plan->objective }} </p>
						<blockquote>
							<p> {!! Purifier::clean($plan->content, 'settings') !!} </p>
						</blockquote>
					</div>
					<div class="panel-footer">
						<p> {{ $plan->department }} </p>
						<p> {{ $plan->tek }} </p>
						<p> {{ $plan->grade_level }} </p>
					</div>
				</div>
			@endforeach
		</div>
	</main>
@stop
