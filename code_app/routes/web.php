<?php

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

/**
 * ユーザー非認証状態でアクセス可
 */
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'TaskController@index')->name('tasks.index');
Route::resource('tasks', 'TaskController', ['only' => ['show']]);

/**
 * ユーザー認証状態でアクセス可
 */
Route::group(['middleware' => ['auth']], function() {
	Route::resource('answers', 'AnswerController', ['only' => ['index', 'show']]);
	Route::post('tasks/{task}/answer', 'AnswerController@check')->name('answers.check');
});
