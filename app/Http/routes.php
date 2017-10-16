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

Route::get('/', 'HomeController@index');

Route::get("/register", "RegistrationController@create");

Route::post("/register", "RegistrationController@store");

Route::get("/logout", "SessionController@destroy");

Route::get("/login", "SessionController@create");

Route::post("/login", "SessionController@store");

Route::get('/home', 'HomeController@index');

Route::get('/message', 'MessageController@index');

Route::get('/signup', [
    'as'   => 'question.register',
    'uses' => 'RegistrationController@show'
]);

Route::get('/redirect/{values}', [
    'as'   => 'redirect',
    'uses' => 'RegistrationController@redirect'
]);

Route::get('/storeperson/{values}', [
    'as'   => 'storeperson',
    'uses' => 'SessionController@storeperson'
]);


Route::post('/question/uploadexcel', [
    'as'   => 'question.uploadexcel',
    'uses' => 'QuestionController@uploadexcel'
]);


Route::get('/users/students', [
    'as'   => 'user.students',
    'uses' => 'UserController@students'
]);

Route::get('/users/parents', [
    'as'   => 'user.parents',
    'uses' => 'UserController@parents'
]);

Route::get('/users/staff', [
    'as'   => 'user.parents',
    'uses' => 'UserController@staff'
]);

Route::get('/users/settings', [
    'as'   => 'user.settings',
    'uses' => 'UserController@settings'
]);

Route::get('/users/clerks', [
    'as'   => 'user.clerks',
    'uses' => 'UserController@clerks'
]);

Route::get('/users/profile', [
    'as'   => 'user.profile',
    'uses' => 'UserController@profile'
]);

Route::get('/users/child/{child}', [
    'as'   => 'user.child',
    'uses' => 'UserController@child'
]);

Route::get('/users/teacherprofile/{child}', [
    'as'   => 'user.teacherprofile',
    'uses' => 'UserController@teacherprofile'
]);

Route::get('/users/clerkprofile/{child}', [
    'as'   => 'user.clerkprofile',
    'uses' => 'UserController@clerkprofile'
]);

Route::get('/users', 'UserController@index');



Route::get('/question/{category}/verify', [
    'as'   => 'question.verify',
    'uses' => 'QuestionController@verify'
]);

Route::get('/question/upload', [
    'as'   => 'question.upload',
    'uses' => 'QuestionController@upload'
]);

Route::post('/question/uploadexcel', [
    'as'   => 'question.uploadexcel',
    'uses' => 'QuestionController@uploadexcel'
]);

Route::get('/question', [
    'as'   => 'question.index',
    'uses' => 'QuestionController@index'
]);

Route::get('/question/create', [
    'as'   => 'question.create',
    'uses' => 'QuestionController@create'
]);

Route::get('/question/{category}/correct/{answer}', [
    'as'   => 'question.correct',
    'uses' => 'QuestionController@correct'
]);
Route::post('/saveexplanation/{category}', [
    'as'   => 'question.saveexplanation',
    'uses' => 'QuestionController@saveexplanation'
]);
Route::resource('question','QuestionController');

Route::resource('category','CategoryController');
Route::resource('subject','SubjectController');


