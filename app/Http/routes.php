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
Route::get('/loginSocialiteRedirect/{loginType}', 'SocialAuthController@redirect');
Route::get('/loginSocialiteCallback/twitter', 'SocialAuthController@callbackTwitter');
Route::get('/loginSocialiteCallback/google', 'SocialAuthController@callbackGoogle');
Route::get('/loginSocialiteCallback/facebook', 'SocialAuthController@callbackFacebook');
Route::post('/usuario/login','UserController@login');
Route::post('/usuario/logout','UserController@logout');

Route::post('/usuario/register',[
	'as' => 'user_register',
	'uses' => 'UserController@register']);

Route::get('/home', 'HomeController@index');
Route::get('/dashboard', 'UserController@index');

Route::group(['middleware' => ['auth']], function () {
	Route::group(['middleware' => ['usertype']], function () {
		Route::get('/test', 'IndexController@test');
		Route::post('/test', 'IndexController@testPost');	
	});	
	Route::group(['middleware' => ['dataConfirmed']],function(){
		Route::get('/myprofile','UserController@myprofile');
	});
	Route::group(['middleware' => ['dataNotConfirmed']],function(){
		Route::get('/myprofile/editprofile','UserController@myprofile_edit');
		Route::post('/myprofile/editprofile','UserController@myprofile_edit_post');
	});
	
    
});



Route::get('/findBooks',[
	'as' => 'findBooks',
	'uses' => 'IndexController@findBooks'
	]);
Route::get('/findBooks/{categoria}', 'IndexController@findBooksCategoria');
Route::get('/findBooks/allCategories', 'IndexController@allCategories');
Route::get('/bookDetail/{bookID}','IndexController@bookDetail');

Route::get('register/verify/{confirmationCode}','UserController@registerconfirm');
Route::get('/test2', 'IndexController@test2');
Route::post('/test2', 'IndexController@test2Post');

Route::group(['prefix'=>'tarea8'],function(){
	//Route::group(['middleware' => ['auth','usertypetarea8']], function () {
		Route::get('/','TareasController@tarea8_index');
		Route::post('/','TareasController@tarea8_post');
		Route::post('/borrar','TareasController@tarea8_postborrar');
	//});
});
Route::group(['prefix'=>'tarea9'],function(){
	//Route::group(['middleware' => ['auth','usertypetarea8']], function () {
		Route::get('/','TareasController@tarea9_index');
	//});
});