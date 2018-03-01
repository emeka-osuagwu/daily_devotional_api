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


Route::get('login/{platform}', 'Api\UserController@socialLogin');
Route::get('login/{platform}/callback', 'Api\UserController@socialLoginCallback');


Route::get('/logout', 'Web\Auth\LoginController@logout');
Route::get('/login', 'Web\Auth\LoginController@getLogin')->middleware('guest');
Route::post('/login', 'Web\Auth\LoginController@postLogin')->middleware('guest');

Route::group(['prefix' => '/'], function () {
	
	Route::get('/', 'Web\DashboardController@dashboard')->middleware('auth');
	
	Route::get('devotions', 'Web\DevotionController@getDevotions')->middleware('auth');
	Route::group(['prefix' => 'devotion'], function () {
		Route::get('create', 'Web\DevotionController@getCreateDevotion')->middleware('auth');
		Route::post('create', 'Web\DevotionController@postCreateDevotion')->middleware('auth');
		Route::post('upload', 'Web\DevotionController@postUploadDevotion')->middleware('auth');
		Route::get('calender_filter', 'Web\DevotionController@getCalenderFilter')->middleware('auth');
		Route::get('{id}', 'Web\DevotionController@getDevotion')->middleware('auth');
		Route::get('{id}/delete', 'Web\DevotionController@deleteDevotion')->middleware('auth');
		Route::get('{id}/edit', 'Web\DevotionController@editDevotion')->middleware('auth');
		Route::post('update', 'Web\DevotionController@updateDevotion')->middleware('auth');
	});
	
	Route::group(['prefix' => 'category'], function () {
		Route::post('/upload', 'Web\CategoryController@uploadCategory')->middleware('auth');
		Route::get('/create', 'Web\CategoryController@createCategory')->middleware('auth');
		Route::post('/create', 'Web\CategoryController@postCreateCategory')->middleware('auth');
		Route::post('/update', 'Web\CategoryController@postUpdateCreateCategory')->middleware('auth');
		Route::get('{id}', 'Web\CategoryController@editCategory')->middleware('auth');
		Route::get('{id}/delete', 'Web\CategoryController@deleteCategory')->middleware('auth');
	});
	Route::get('categories', 'Web\CategoryController@getCategories')->middleware('auth');
	
	Route::group(['prefix' => 'subscription'], function () {
		Route::get('/create', 'Web\SubscriptionController@getCreateSubscription')->middleware('auth');
		Route::post('/create', 'Web\SubscriptionController@postCreateSubscription')->middleware('auth');
		Route::get('/activate', 'Web\SubscriptionController@getActiveSubscription')->middleware('auth');
		Route::post('/activate', 'Web\SubscriptionController@postActivateSubscription')->middleware('auth');
		Route::get('{id}/delete', 'Web\SubscriptionController@getDeleteSubscription')->middleware('auth');
		Route::get('activate/users', 'Web\SubscriptionController@getActiveUserSubscription')->middleware('auth');
		Route::post('activate/users', 'Web\SubscriptionController@postActiveUserSubscription')->middleware('auth');
		Route::post('activate/users-upload', 'Web\SubscriptionController@postActiveUserUpload')->middleware('auth');
	});

	Route::get('subscriptions', 'Web\SubscriptionController@getSubscriptions')->middleware('auth');
});
