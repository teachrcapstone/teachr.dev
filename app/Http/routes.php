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

//Social functionality routes...
Route::get('follow/{id}', 'UsersController@follow');
Route::get('unfollow/{id}', 'UsersController@unfollow');
Route::get('like/{id}', 'PlansController@like');
Route::get('unlike/{id}', 'PlansController@unlike');
Route::get('copy/{id}', 'PlansController@copy');

Route::get('savedplans', 'UsersController@savedPlans');
Route::get('dashboard', 'UsersController@dashboard');
Route::get('myposts', 'UsersController@myPosts');
Route::resource('users', 'UsersController');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');
