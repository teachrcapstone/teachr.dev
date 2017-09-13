<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container container-fluid">
		<div class="navbar-header navbar-brand">
			<i class="glyphicon glyphicon-apple"></i>Teachr
		</div>
		<button class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>

			@if(Auth::check())
    	<div class="collapse navbar-collapse" id="navbar">
				<ul class="nav navbar-nav">
					<li><a href="{{ action('UsersController@dashboard') }}">Dashboard</a></li>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Lessons <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="{{ action('PlansController@index') }}">View Lessons</a></li>
								<li><a href="#">View My Lessons</a></li>
								<li><a href="{{ action('PlansController@create') }}">Add Lesson</a></li>
							</ul>
					</li>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Discussion Board <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="{{ action('PostsController@index') }}">View Posts</a></li>
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
							<li><a href="{{ action('UsersController@edit', Auth::id()) }}">Account Settings <i class="glyphicon glyphicon-pencil"></i></a></li>
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
		</div>

	</div>
</nav>
