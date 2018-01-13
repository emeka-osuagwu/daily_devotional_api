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

Route::group(['prefix' => '/'], function () {

	Route::get('/', 'Web\DashboardController@dashboard');
	
	Route::get('devotions', 'Web\DevotionController@getDevotions');
	Route::group(['prefix' => 'devotion'], function () {
		Route::get('{id}', 'Web\DevotionController@getDevotion');
		Route::get('{id}/delete', 'Web\DevotionController@deleteDevotion');
	});

	Route::post('add', 'Api\UserController@addUser');
	Route::get('{token}/notes', 'Api\NoteController@getUserNotes');
	Route::get('{token}/favorite', 'Api\FavoriteController@favoriteDevtions');
	Route::get('{token}/favorite/delete', 'Api\FavoriteController@unfavoriteDevtion');
});
