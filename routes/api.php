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

	Route::get('users', 'Api\UserController@getAllUser');
	Route::get('user/{id}', 'Api\UserController@getUser');
	
	Route::group(['prefix' => 'user'], function () {
		Route::post('add', 'Api\UserController@addUser');
		Route::get('{id}/notes', 'Api\NoteController@getUserNotes');
		Route::get('{token}/favorite', 'Api\FavoriteController@favoriteDevtions');
		Route::get('{token}/favorite/delete', 'Api\FavoriteController@unfavoriteDevtion');
		Route::post('save_user_push_token', 'Api\UserController@postSaveUserPushToken');
	});
	
	Route::post('send-message', 'Api\UserController@sendFeedback');
	
	Route::get('devotions', 'Api\DevotionController@viewDevotions');
	
	Route::group(['prefix' => 'devotion'], function () {
		Route::post('{id}/like', 'Api\FavoriteController@likeDevotion');
		Route::get('basic/{id}', 'Api\DevotionController@getBackInfo');
		Route::get('categories', 'Api\DevotionController@viewDevotionCategories');
		Route::get('{id}', 'Api\DevotionController@viewDevotion');
		Route::get('date/{date}', 'Api\DevotionController@viewDevotionDay');
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

	Route::get('notes', 'Api\NoteController@getAllNotes');

	Route::group(['prefix' => 'note'], function () {
		Route::get('{id}', 'Api\NoteController@getNote');
		Route::post('create', 'Api\NoteController@addNote');
		Route::post('{id}/update', 'Api\NoteController@updateNote');
		Route::get('{id}/delete', 'Api\NoteController@deleteNote');
	});

	Route::group(['prefix' => 'payment'], function () {
		Route::post('initialize', 'Api\PaymentController@initializePayment');
		Route::get('initialize_callback', 'Api\PaymentController@initializePaymentCallback');
		Route::post('varify_transaction', 'Api\PaymentController@varify');
	});

	Route::post('send-notification', 'Api\NotificationController@postSendNotification');
	
	Route::get('delete-user/{id}', 'Api\UserController@postDeleteUser');
	Route::post('update-user-push-token', 'Api\UserController@updatePushToken');
	Route::get('update-user-helper/{id}/{field}/{value}', 'Api\UserController@updateUserHelper');

	Route::get('login/{platform}', 'Api\UserController@socialLogin');
	Route::get('login/{platform}/callback', 'Api\UserController@socialLoginCallback');

});