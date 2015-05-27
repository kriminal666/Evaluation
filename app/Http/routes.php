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

Route::group(['prefix' => 'api'], function () {

    Route::resource('evaluations', 'ModelControllers\EvaluationController');

    Route::resource('users', 'ModelControllers\UsersController');

    Route::resource('gradescales', 'ModelControllers\GradeScaleController');

    Route::resource('marks', 'ModelControllers\MarkController');

    Route::resource('studysubmodules', 'ModelControllers\StudySubmodulesController');

    Route::resource('studymodules', 'ModelControllers\StudyModuleController');

});

Route::get('evaluationswithTrashed', 'ModelControllers\EvaluationController@indexWithTrashed');

Route::get('gradescale/{id}/marks', 'ModelControllers\GradeScaleController@getMarks');

Route::get('user/{id}/evaluations/', 'ModelControllers\UsersController@getUserEvaluations');

Route::match(array('GET', 'POST'), 'usersgroupevaluations', 'ModelControllers\UsersController@getGroupEvaluations');

Route::get('studymodule/{id}/submodules', 'ModelControllers\StudyModuleController@getSubModules');

Route::get('studymodule/{id}/usersubmodulesevaluation', 'ModelControllers\StudyModuleController@getUsersSubModulesEvaluations');

Route::get('submodule/{id}/evaluations', 'ModelControllers\StudySubmodulesController@getEvaluations');

Route::get('mark/{id}/gradescale', 'ModelControllers\MarkController@gradeScale');

Route::delete('evaluation/{id}', 'ModelControllers\EvaluationController@delete');

Route::get('test', function () {
    return view('evaluation_test');
});

Route::get('table_dynamic', function () {
    return view('evaluation_dynamic');
});

Route::get('table_static', function () {
    return view('evaluation_static');
});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
