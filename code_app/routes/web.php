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
 * いかなる状態でもアクセス可
 */
Route::get('/', 'TaskController@index')->name('tasks.index');

/**
 * ユーザー非認証状態でアクセス可
 */
Route::group(['middleware' => 'guest:user'], function() {
	Auth::routes();
	Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('login', 'Auth\LoginController@login')->name('login');
	Route::get('guest_login', 'Auth\LoginController@guestLogin')->name('guest_login');
});

/**
 * ユーザー認証状態でアクセス可
 */
Route::group(['middleware' => 'auth:user'], function() {
	Route::post('logout', 'Auth\LoginController@logout')->name('logout');
	Route::resource('users', 'UserController', ['only' => ['show', 'edit', 'update']]);
	Route::resource('tasks', 'TaskController', ['only' => ['show', 'create', 'store']]);
	Route::resource('answers', 'AnswerController', ['only' => ['index', 'show']]);
	Route::post('tasks/{task}/answer', 'AnswerController@check')->name('answers.check');
});

/**
 * 管理者非認証状態でアクセス可
 */
Route::group(['prefix' => 'admin', 'middleware' => 'guest:admin'], function() {
	Route::name('admin.')->group( function() {
		Route::get('login', 'Admin\LoginController@showLoginForm')->name('login');
		Route::post('login', 'Admin\LoginController@login')->name('login');
	});
});

/**
 * 管理者認証状態でアクセス可
 */
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
	Route::name('admin.')->group( function() {
		Route::post('logout', 'Admin\LoginController@logout')->name('logout');
		Route::get('dashboard', 'Admin\DashboardController@dashboard')->name('dashboard');
		Route::resource('tasks', 'Admin\TaskController', ['except' => ['create', 'destroy']]);
	});
});
