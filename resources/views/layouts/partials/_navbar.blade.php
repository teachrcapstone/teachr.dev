<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container container-fluid">
		<div class="navbar-header">
			<i class="glyphicon glyphicon-apple navbar-brand">Teachr</i>
		</div>
		<ul class="nav navbar-nav">
			<li><a href="#">Lessons</a></li>
			<li><a href="#">Logout</a></li>
		</ul>
		<!-- <ul class="nav navbar-nav navbar-right">
			<li><a href="#">Login <i class="glyphicon glyphicon-log-in"></i></a></li>
			<li><a href="#">Register <i class="glyphicon glyphicon-log-in"></i></a></li>
		</ul> -->

		<!-- search bar -->
		<form method="GET" action="#" class="navbar-form form-inline navbar-right">
		{{!! csrf_field() !!}}
			<input class="form-control mr-sm-2" name="search" type="text" placeholder="Search!">
			<button class="btn my-2 my-sm-0" type="submit">Go!</button>	
		</form>
	</div>
</nav>
