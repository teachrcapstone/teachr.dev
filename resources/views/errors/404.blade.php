@extends('layouts.master')

@section('title')
	<title>Error</title>
	<style type="text/css">

        body {
            padding-top: 6em;
        }

        div.chalk {
            content: url("/img/chalkboardtext.png");
            height: 100%;
            max-width: auto;
        }

        footer {
            color: white;
        }
    </style>
@stop

@section('content')
	<body>
		<h1>This lesson does not exist!</h1>				
	</body>
@stop