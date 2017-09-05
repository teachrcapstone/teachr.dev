<!DOCTYPE html>
<html>
<head>
	@yield('title')
	<link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
	@include('layouts.partials._navbar')
	@yield('content')
</body>
</html>
