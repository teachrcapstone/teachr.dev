<!DOCTYPE html>
<html>
<head>
	@yield('title')
	<link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>

	<!-- if user authorized... make navbar accessible-->
	@include('layouts.partials._navbar')
	<!-- ...end if -->


		@if (session()->has('successMessage'))
			<div class="alert alert-success">{{ session('successMessage') }}</div>
		@endif

		@if (session()->has('errorMessge'))
			<div class="alert alert-error">{{ session('errorMessge') }}</div>
		@endif


	@yield('content')

	@include('layouts.partials._footer')
</body>
</html>
