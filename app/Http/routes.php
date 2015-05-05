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

Route::get('test', function () {
    return view('evaluation_test');
});

/*
 * TODO
Route::get('marks',function(){
        $gradeScale= \Evaluation\GradeScale::find(1);
        foreach( $gradeScale->marks() as $item ){
            return json_encode($item);

        };

});*/

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
