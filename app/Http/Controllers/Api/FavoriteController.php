<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;

use App\Http\Services\FavoriteService;
use App\Http\Services\DevotionService;

class FavoriteController extends Controller
{

	protected $favoriteService;
	protected $devotionService;

	public function __construct
	(
		FavoriteService $favoriteService,
		DevotionService $devotionService 
	)
	{
		$this->favoriteService = $favoriteService;
		$this->devotionService = $devotionService;
	}

	public function favoriteDevtions($token)
	{
		$devotion_ids = $this->favoriteService->getFavoritesBy('user_id', $token)->get()->pluck('devotion_id');
		$response_data = [
			'data' => $this->devotionService->getDevotionWhereIn('id', $devotion_ids)->get(),
			'status' => 200
		];

		return sendResponse($response_data, 200);
	}

	public function likeDevotion(Request $request, $id)
	{
		$request['devotion_id'] = $id;

		return $this->favoriteService->likeDevotion($request->all());
		
		$response_data = [
			'message' => 'devotion liked',
			'status' => 200
		];

		return sendResponse($response_data, 200);
	}


	public function unfavoriteDevtion($id)
	{
		$this->favoriteService->unfavoriteDevtion($id);
		
		$response_data = [
			'message' => 'devotion unliked',
			'status' => 200
		];
		
		return sendResponse($response_data, 200);
	}
}
