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

Route::group(['prefix' =>'api'], function (){

    Route::resource('evaluation', 'ModelControllers\EvaluationController');

    Route::resource('users', 'ModelControllers\UsersController');

    Route::resource('gradescale', 'ModelControllers\GradeScaleController');

    Route::resource('studysubmodules', 'ModelControllers\StudySubmodulesController');

});



Route::get('gradescale/{id}/marks', 'ModelControllers\GradeScaleController@getMarks');

Route::get('/user/evaluation/{id}', 'ModelControllers\UsersController@getUserEvaluations');

Route::get('test1', 'ModelControllers\MarkController@test');

Route::get('test', function () {
    return view('evaluation_test');
});


Route::get('marks', function () {


    return \Evaluation\GradeScale::findOrFail(1)->marks();


});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

//Get last query

 /*Event::listen('illuminate.query', function($sql)
 {
  var_dump($sql);
  });*/