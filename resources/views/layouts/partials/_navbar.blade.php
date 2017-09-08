<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container container-fluid">
		<div class="navbar-header navbar-brand">
			<i class="glyphicon glyphicon-apple"></i>Teachr
		</div>

			@if(Auth::check())
				<ul class="nav navbar-nav">
					<li><a href="{{ action('UsersController@dashboard') }}">Dashboard</a></li>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Lessons <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="{{ action('PlansController@index') }}">View Lessons</a></li>
								<li><a href="{{ action('PlansController@create') }}">Add Lesson</a></li>
							</ul>
					</li>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Discussion Board <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="{{ action('PostsController@index') }}">View All Posts</a></li>
								<li><a href="{{ action('UsersController@myPosts') }}">View My Posts</a></li>
								<li><a href="{{ action('PostsController@create') }}">Add Post</a></li>
							</ul>
					</li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					<!-- <li><a href="{{ action('Auth\AuthController@getLogout') }}"">Logout</a></li> -->

					<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Account Information <i class="glyphicon glyphicon-user"></i></a></li>
								<li><a href="{{ action('UsersController@show', Auth::id()) }}">View My Profile <i class="glyphicon glyphicon-user"></i></a></li>
							<li><a href="{{ action('Auth\AuthController@getLogout') }}">Logout <i class="glyphicon glyphicon-log-out"></i></a></li>
						</ul>
					</li>
				</ul>

			@else
				<ul class="nav navbar-nav navbar-right">
					<li><a href="{{ action('Auth\AuthController@getLogin')}}">Login <i class="glyphicon glyphicon-log-in"></i></a></li>
					<li><a href="{{ action('Auth\AuthController@getRegister')}}">Register <i class="glyphicon glyphicon-log-in"></i></a></li>
				</ul>
			@endif

		<!-- search bar -->
<!-- 		<form method="GET" action="{{ action('PostsController@index') }}" class="navbar-form form-inline navbar-right" role="search">
		{{!! csrf_field() !!}}
			<input class="form-control mr-sm-2" name="q" type="text" placeholder="Search!">
			<button class="btn my-2 my-sm-0" type="submit">Go!</button>
		</form> -->
	</div>
</nav>
