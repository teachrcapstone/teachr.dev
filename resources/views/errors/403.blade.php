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

        #dunce{
            background-color: #349967;
            padding-top: 2em;
            padding-bottom: 2em;
            position: relative;
        }

        div#info{
            color: white;
            font-size: 24px;
            text-align: center;
        }


        img#center-block{
            position: relative;
        }

    </style>
@stop

@section('content')
	<body>
        <div class="container" id="dunce">
            <div id="dunce">
                <img class="center-block" src="/img/403dunce.png">
            </div>
            <div id="info">You're not allowed to do that! </div>     
        </div>
	</body>
@stop
