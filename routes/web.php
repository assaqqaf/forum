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

Route::get('/', 'ThreadsController@index');
Auth::routes();

Route::redirect('/home', 'threads');

Route::resource('threads', 'ThreadsController');

Route::post('threads/{thread}/post', 'PostController@store');
