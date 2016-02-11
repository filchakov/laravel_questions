<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return abort(404);
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['prefix' => 'api/v1'], function () {

    Route::get('user/{name}/question', 'UserQuestionController@index');
    Route::post('user/{name}/question', 'UserQuestionController@store');

    Route::get('user/{name}/reply', 'UserReplyController@index');
    Route::post('user/{name}/question/{question_id}/reply', 'UserReplyController@store');

    Route::resource('user', 'UserController', ['only' => ['index', 'show', 'store']]);
    Route::resource('question', 'QuestionController', ['only' => ['index', 'show']]);
    Route::resource('reply', 'ReplyController', ['only' => ['index', 'show']]);

});
