@extends('layouts.master')

@section('title')
	<title>Teachr</title>
	<style type="text/css">

		main {
			padding-top: 3em;
		}

		div.chalk {
			content: url("/img/teachrSplash.png");
			height: 100%;
			max-width: auto;
		}

		footer {
			color: white;
		}

        .splashIcon{
            width: 70%;
            max-height: 70%;
        }

        .teachr{
            padding-top: 2em;
        }


	</style>
@stop

@section('content')

	  <main>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 chalk "></div>
			</div>

			<br>
			@if(!Auth::check())
				<div class="row">
					<div class="col-xs-4 col-xs-offset-2 col-lg-3 col-lg-offset-3 text-center">
						<form action="{{action('Auth\AuthController@getLogin')}}">
							<button class="btn btn-primary btn-md btn-block">login</button>
						</form>
					</div>

					<div class="col-xs-4  col-lg-3  text-center">
						<form action="{{action('Auth\AuthController@getRegister')}}">
							<button class="btn btn-primary btn-md btn-block">signup</button>
						</form>
					</div>
				</div>
			@endif
			<br>
			
		<div class="container">
			<div class="row">
				<div class="col-xs-12">

					<h1>In Teachr, you can...</h1>

					<div class="row teachr">

                        <div class="col-sm-4 text-center">
                            <img class="splashIcon" src="/img/documenticonRed.png">
                            <h3>Submit Lesson Plans</h3>
                        </div>

                        <div class="col-sm-4 text-center">
                            <img class="splashIcon" id="chat" src="img/chatIcon.png">
                            <h3> Take Part in Discussion</h3>
                        </div> 

                        <div class="col-sm-4 text-center">
                            <img class="splashIcon" src="/img/check.png">
                            <h3>Make Existing Plans your own</h3>
                        </div>              
                    </div>

                    <h4>Through Teachr, you can connect and collaborate with fellow educators across the world. In uplifting each other, we can uplift students--and therby pave the way for a brighter future.<a href="{{action('Auth\AuthController@getRegister')}}">Let's get you started.</a></h4>
                    <h4>Class is in session!</h4>
				</div>
			</div>
		</div>

	  </main>     

@stop