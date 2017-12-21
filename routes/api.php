<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['prefix' => 'v1'], function () {

	Route::get('devotions', 'Api\DevotionController@viewDevotions');
	
	Route::group(['prefix' => 'devotion'], function () {
		Route::get('/', 'Api\UserController@welcome');
		Route::post('upload', 'Api\DevotionController@bulkUploadDevotion');
	});

});