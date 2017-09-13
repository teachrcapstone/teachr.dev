@extends('layouts.master')

@section('title')
    <title>Teachr</title>
    <style type="text/css">

        body {
            padding-top: 6em;
        }

        div.chalk {
            content: url("/img/teachrSplash.png");
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
            @if(Auth::check())
            @else
            <div class="container col-centered text-centered">
                <div class="row btn-group-lg">
                    <div class="col-md-6 btn">
                        <form action="{{action('Auth\AuthController@getLogin')}}">
                            <button class="btn btn-primary btn-lg col-md-6">login</button>
                        </form>
                    </div>
                    <div class="col-md-6 btn">
                        <form action="{{action('Auth\AuthController@getRegister')}}">
                            <button class="btn btn-primary btn-lg col-md-6">signup</button>
                        </form>
                    </div>
                </div>
                
            </div>
            @endif
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