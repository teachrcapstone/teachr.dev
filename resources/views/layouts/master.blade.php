<!DOCTYPE html>
<html>
<head>
	@yield('title')
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>

	<!-- if user authorized... make navbar accessible-->
	@include('layouts.partials._navbar')
	<!-- ...end if -->

	@yield('content')

	@include('layouts.partials._footer')
</body>
</html>
