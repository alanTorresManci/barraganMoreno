<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/user/create', function()
{
	return View::make('crear');
});
Route::post('/create',[
	'as' => 'create', 'uses' => 'UserController@create'
	]);
Route::get('/',[
	'as' => '/', 'uses' => 'UserController@login'
	]);
Route::get('/index',[
	'as' => 'index', 'uses' => 'UserController@index'
	]);
Route::post('/login',[
	'as' => 'login', 'uses' => 'UserController@enter'
	]);
Route::get('/logout',[
	'as' => 'logout', 'uses' => 'UserController@logout'
	]);
Route::get('user/edit',[
	'as'=> 'editProfile', 'uses' => 'UserController@edit'
	]);
Route::post('/edit',[
	'as' => 'edit', 'uses' => 'UserController@change'
	]);
Route::get('property/create',[
	'as'=> 'propertyCreate', 'uses' => 'PropertyController@create'
	]);
Route::post('/propCreate',[
	'as' => 'propCreate', 'uses' => 'PropertyController@createP'
	]);
Route::get('property/view',[
	'as'=> 'propertyView', 'uses' => 'PropertyController@view'
	]);