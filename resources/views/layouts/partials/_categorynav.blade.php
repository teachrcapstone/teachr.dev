<nav class="navbar ">
	<div class="container container-fluid">
		<form class="navbar-form" action="{{ action('PostsController@index') }}">
			<div class="row text-center">
				<button class="btn btn-default btn-md" type="submit" name="category" value="all">View All</button>	
				<button class="btn btn-default btn-md" type="submit" name="category" value="general">General</button>	
				<button class="btn btn-default btn-md" type="submit" name="category" value="elementary">Elementary(K-5)</button>		
				<button class="btn btn-default btn-md" type="submit" name="category" value="3">Middle(6-8)</button>
				<button class="btn btn-default btn-md" type="submit" name="category" value="4">High(9-12)</button>	
				<button class="btn btn-default btn-md" type="submit" name="category" value="5">Technology</button>	
				<button class="btn btn-default btn-md" type="submit" name="category" value="6">Management</button>	
				<button class="btn btn-default btn-md" type="submit" name="category" value="7">Administration</button>		
				<button class="btn btn-default btn-md" type="submit" name="category" value="8">Other</button>				
			</div>
		</form>
	</div>
</nav>