<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Web\Controller;

use App\Http\Services\UserService;
use App\Http\Services\FavoriteService;
use App\Http\Services\DevotionService;

class DevotionController extends Controller
{

	protected $userService;
	protected $favoriteService;
	protected $devotionService;

	public function __construct
	(
		UserService $userService,
		FavoriteService $favoriteService,
		DevotionService $devotionService 
	)
	{
		$this->userService = $userService;
		$this->favoriteService = $favoriteService;
		$this->devotionService = $devotionService;
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
