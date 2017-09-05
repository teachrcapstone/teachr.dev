@extends('layouts.master')

@section('title')
    <title>Teachr</title>
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
      <main>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 chalk "></div>
            </div>
            <!-- buttons are intended to be larger -->
            <div class="row btn-group-lg">
                <div class="col-md-6 btn">
                    <button class="btn btn-primary">login</button>
                </div>
                <div class="col-md-6 btn">
                    <button class="btn btn-primary">signup</button>
                </div>
            </div>
        </div>
            
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1>What is Teachr?</h1>
                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
                </div>
            </div>
        </div>

      </main>     
    </body>
@stop