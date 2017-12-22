<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;

use App\Http\Services\DevotionService;
use App\Http\Validations\DevotionValidation;

class FavoriteController extends Controller
{

	protected $devotionService;
	protected $devotionValidation;

	public function __construct
	(
		DevotionService $devotionService,
		DevotionValidation $devotionValidation 
	)
	{
		$this->devotionService = $devotionService;
		$this->devotionValidation = $devotionValidation;
	}

	public function favoriteDevtions($value='')
	{
		# code...
	}

	public function favoriteDevtion($value='')
	{
		# code...
	}

	public function unfavoriteDevtion($value='')
	{
		# code...
	}
}
