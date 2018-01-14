<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Web\Controller;

use App\Http\Services\UserService;
use App\Http\Services\FavoriteService;
use App\Http\Services\DevotionService;
use App\Http\Validations\DevotionValidation;

class DevotionController extends Controller
{

	protected $userService;
	protected $favoriteService;
	protected $devotionService;
	protected $devotionValidation;

	public function __construct
	(
		UserService $userService,
		DevotionService $devotionService,
		FavoriteService $favoriteService,
		DevotionValidation $devotionValidation 
	)
	{
		$this->userService = $userService;
		$this->favoriteService = $favoriteService;
		$this->devotionService = $devotionService;
		$this->devotionValidation = $devotionValidation;
	}
	
	public function getCreateDevotion(Request $request)
	{
		$categories = $this->devotionService->getCategories();
		return view('admin.pages.create_devotion', compact('categories'));
	}

	public function postCreateDevotion(Request $request)
	{
		$validator = $this->devotionValidation->createDovation($request->all());

		if ($validator->fails()) 
		{
			return back()->withErrors($validator->errors());
		}

		$this->devotionService->createDovotionCategory($request);
		
		$response_data = [
			'status' => 200,
			'message' => 'category created'
		];

		return sendResponse($response_data, 200);
	}


	public function getDevotions()
	{
		$devotions = $this->devotionService->getPaginated(30);
		return view('admin.pages.devotions', compact('devotions'));
	}

	public function getDevotion($id)
	{
		$devotion = $this->devotionService->getDevotionWhere('id', $id)->get()->first();
		return view('admin.pages.devotion', compact('devotion'));
	}

	public function deleteDevotion($id)
	{
		$this->devotionService->deleteDevotion($id);
		return redirect('devotions');
	}
}
