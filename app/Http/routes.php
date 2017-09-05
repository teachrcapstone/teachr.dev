<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Test route: remove later
Route::get('/404', function(){
    return view('errors.404');
});

Route::resource('posts', 'PostsController');

Route::resource('plans', 'PlansController');

Route::resource('users', 'UsersController');
