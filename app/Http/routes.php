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

Route::resource('api/evaluation', 'ModelControllers\EvaluationController');

Route::resource('api/users', 'ModelControllers\UsersController');
Route::resource('api/gradescale', 'ModelControllers\GradeScaleController');

Route::get('test', function () {
    return view('evaluation_test');
});


Route::get('marks', function () {


    return \Evaluation\GradeScale::find(1)->marks();


});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

/**Get last query
 * Event::listen('illuminate.query', function($sql)
 * {
 * var_dump($sql);
 * });**/