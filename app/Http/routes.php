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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('evaluation/{id}', 'ModelControllers\EvaluationController@show');

Route::get('evaluation', 'ModelControllers\EvaluationController@showAll');

Route::get('user/{id}', 'ModelControllers\UsersController@show');

Route::get('users', 'ModelControllers\UsersController@showAll');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
