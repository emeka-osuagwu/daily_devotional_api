<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;

use App\Http\Services\FavoriteService;
use App\Http\Validations\DevotionValidation;

class FavoriteController extends Controller
{

	protected $favoriteService;
	protected $devotionValidation;

	public function __construct
	(
		FavoriteService $favoriteService,
		DevotionValidation $devotionValidation 
	)
	{
		$this->favoriteService = $favoriteService;
		$this->devotionValidation = $devotionValidation;
	}

	public function favoriteDevtions($token)
	{
		$response_data = [
			'data' => $this->favoriteService->getFavoritesBy('user_id', $token)->get(),
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
