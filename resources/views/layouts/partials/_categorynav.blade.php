<nav class="navbar ">
	<div class="container container-fluid">
		<form class="navbar-form" action="{{ action('PostsController@index') }}">
			<div class="row text-center">
				<button class="btn btn-default btn-md" type="submit" name="category" value="all">View All</button>	
				<button class="btn btn-default btn-md" type="submit" name="category" value="general">General</button>	
				<button class="btn btn-default btn-md" type="submit" name="category" value="elementary">Elementary(K-5)</button>		
				<button class="btn btn-default btn-md" type="submit" name="category" value="middle">Middle(6-8)</button>
				<button class="btn btn-default btn-md" type="submit" name="category" value="high">High(9-12)</button>	
				<button class="btn btn-default btn-md" type="submit" name="category" value="technology">Technology</button>	
				<button class="btn btn-default btn-md" type="submit" name="category" value="management">Management</button>	
				<button class="btn btn-default btn-md" type="submit" name="category" value="admin">Administration</button>		
				<button class="btn btn-default btn-md" type="submit" name="category" value="other">Other</button>				
			</div>
		</form>
	</div>
</nav>