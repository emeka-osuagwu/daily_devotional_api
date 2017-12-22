<?php
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
		
		Route::get('categories', 'Api\DevotionController@viewDevotionCategories');
		Route::get('{id}', 'Api\DevotionController@viewDevotion');
		Route::post('{id}/update', 'Api\DevotionController@updateDevotion');
		Route::post('create', 'Api\DevotionController@createDevotion');
		Route::get('{id}/delete', 'Api\DevotionController@deleteDevotion');			
		
		Route::group(['prefix' => 'category'], function () {
			Route::get('{id}', 'Api\DevotionController@viewDevotionCategory');			
			Route::post('{id}/update', 'Api\DevotionController@updateDevotionCagetory');			
			Route::get('{id}/delete', 'Api\DevotionController@deleteDevotionCategory');			
			Route::post('create', 'Api\DevotionController@createDevotionCategory');			
		});	

		Route::post('upload', 'Api\DevotionController@bulkUploadDevotion');
	});

});