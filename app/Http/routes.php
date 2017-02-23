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

Route::get('/',array(
	'as' => 'indexHome',
	'uses' => 'IndexController@Index'
	));
Route::get('/test', function(){
	return view('testdata');
});
Route::post('/usuario/login','UserController@login');
Route::post('/usuario/logout','UserController@logout');

Route::post('/usuario/register',[
	'as' => 'user_register',
	'uses' => 'UserController@register']);

Route::get('/home', 'HomeController@index');
Route::get('/dashboard', 'UserController@index');
Route::post('/test/sometest/randomtest', 'IndexController@test');
