<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');

Route::resource('polls', 'PollController')->middleware('verified');
Route::get('polls/{id}/changeStatus', ['as'=> 'polls.changeStatus', 'uses' => 'PollController@changeStatus'])->middleware('verified');

Route::resource('questions', 'QuestionController')->middleware('verified');

Route::resource('responses', 'ResponseController')->middleware('verified');
