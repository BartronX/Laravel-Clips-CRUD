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

Route::get('/', 'ClipController@index');
Route::get('/create', 'ClipController@create');
Route::get('/edit', 'ClipController@edit');
Route::get('/show', 'ClipController@show');

Route::resource('clips', 'ClipController');
