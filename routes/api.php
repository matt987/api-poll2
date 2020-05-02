<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('polls', 'PollAPIController');

Route::resource('questions', 'QuestionAPIController');

Route::resource('responses', 'ResponseAPIController');

Route::get('getActivePolls', 'MainAPIController@getActivePolls');
Route::get('getPoll/{id}', 'MainAPIController@getPoll');
Route::get('getResults/{id}', 'MainAPIController@getResults');
Route::post('setResponsePoll', 'MainAPIController@setResponsePoll');
