<!DOCTYPE html>
<html>
<head>
	@yield('title')
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<script type="text/javascript" src="https://static.filestackapi.com/v3/filestack.js"></script>
	{{-- <script src="https://api.filestackapi.com/filestack.js"></script> --}}
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
	@include('layouts.partials._filestack')
	<!-- @include('layouts.partials._footer') -->
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<script type="text/javascript" src="/js/bootstrap.js"></script>
	@yield('scripts')
</body>
</html>
