@extends('layouts.master')

@section('title')
	<title>Lesson Plans</title>
@stop

@section('content')

	<main class="container">
		<h1 class='text-center'>Find Lesson Plans</h1>
		{{-- <nav class="col-md-4 col-lg-3">
			<h2>Filter results</h2>
			<ul class="nav nav-stacked">
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
		</nav> --}}
		<div {{-- class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1"--}}>
			<div class="">
				<a class="collapsed" role="button" data-toggle="collapse" data-targer="#filters" href="#filters">
					Filter Results
				</a>
			</div>
			<form name='filter' id="filter" action="{{ action('PlansController@index') }}" method="get">
			<div class='collapse' id="filters">
					<ul class="list-inline">
						<li data-toggle='collapse'>
							<input type="text" name="search" placeholder="Keyword" method='GET'>

						</li>
						<li data-toggle='collapse'>
							<select form='filter' method='get' class="" name="department">
								<option value="">All</option>
								<option value="math">Math</option>
								<option value="science">Science</option>
								<option value="social Studies">Social Studies</option>
								<option value="english">English</option>
							</select>
						</li>
						<li data-toggle='collapse'>
							<select form='filter' method='get' class="" name="grade_level">
								<option value="">All</option>
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
						</li>
						<li data-toggle="collapse">
						</form>
						<button method='get' type="submit">Filter</button>
						</li>
					</ul>
			</div>
				<div class="grid">
					@foreach ($plans as $plan)
					<div class="grid-sizer col-lg-4 col-md-6 col-sm-12 col-xs-12"></div>
					<div class="grid-item col-lg-4 col-md-6 col-sm-12 col-xs-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<div class="text-right">
										<a class='expand btn btn-xs btn-default'><i class="glyphicon glyphicon-resize-full"></i></a>
										<a class="reduce btn btn-xs btn-default hidden" hidden><i class="glyphicon glyphicon-resize-small"></i></a>
									</div>
									<div class="text-left">
										<a href="{{ action('PlansController@show', $plan->id) }}"><span class='h2'> {{ $plan->name }} </span>
											<span class='h5'> by {{ $plan->user->name }} </span></a>
									</div>

								</div>
								<div class="panel-body">
									<p> <span class='h4'>Objective: </span> {{ $plan->objective }} </p>
									<blockquote class='plan-preview'>

									</blockquote>
									<blockquote class='plan-content' hidden>
										<p> {!! Purifier::clean($plan->content, 'settings') !!} </p>
									</blockquote>
								</div>
								<div class="panel-footer">
									<ul class='list-inline'>
										<li> {{ $plan->department }} </li>
										<li> {{ $plan->tek }} </li>
										<li> {{ $plan->grade_level }} </li>
									</ul>
								</div>
							</div>
					</div>
				@endforeach
				</div>
		</div>
	</main>
@stop
@section('scripts')
	<style media="screen">
		.grid {
			width: 100%;
		}
		.grid-item {
			float: left;

		}
		.grid-sizer,
		.grid-item {
					margin-bottom: 5px;
					margin-top: 0;}
		/* 2 columns wide */
		.grid-item--width2 { width: 40%; }
	</style>
	<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){

			$('.plan-preview').each(function (i) {

				var paragraphs = $('.plan-content')[i];

				paragraphs = $(paragraphs).find('p');

				array = [];

				paragraphs.each(function(){
					if (this.textContent.search(/\w+/) >= 0) { array.push(this.outerHTML);
					return array
					}
				});

				if (array.length >= 8){

					array2 = [];

					for (var i = 0; i < 8; i++) {
						array2.push(array.shift());
					}

					var string = '';
					array2.forEach(function(p){
						string += p.toString();
					});


				} else {

					var string = '';

					array.forEach(function(p){
						string += p.toString();
					});

				}

				$(this).html(string);

			});

			$('.expand').each(function(index){

				var preview = $('.plan-preview')[index];

				var content = $('.plan-content')[index];

				var reduce = $('.reduce')[index];

				var gridItem = $('.grid-item')[index];

				$(this).click(function(e) {

					e.preventDefault();
					$(this).toggleClass('hidden');
					$(reduce).toggleClass('hidden');
					$(preview).toggle();
					$(content).toggle();
					$(gridItem).toggleClass('col-lg-4 col-lg-8 col-md-6 col-md-12');
					$grid.masonry();

				});

			});

			$('.reduce').each(function(index){

				var preview = $('.plan-preview')[index];

				var content = $('.plan-content')[index];

				var expand = $('.expand')[index];

				var gridItem = $('.grid-item')[index];

				$(this).click(function(e) {

					e.preventDefault();
					$(this).toggleClass('hidden');
					$(expand).toggleClass('hidden');
					$(preview).toggle();
					$(content).toggle();
					$(gridItem).toggleClass('col-lg-4 col-lg-8 col-md-6 col-md-12');
					$grid.masonry();

				});

			});

			var $grid = $('.grid').masonry({
				columnWidth: '.grid-sizer',
				itemSelector: '.grid-item',
				percentPosition: true,
				// gutter: 5
			});
			// console.log($grid);
			var $items = $('grid-items');

			$grid.masonry('layout');
		});
	</script>
	{{-- <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
	<script type="text/javascript">

	</script> --}}
@stop
