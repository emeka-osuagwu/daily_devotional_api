<?php

namespace App\Http\Controllers\Web;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Web\Controller;

use App\Http\Services\UserService;
use App\Http\Services\FavoriteService;
use App\Http\Services\DevotionService;

class DashboardController extends Controller
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
	
	public function dashboard()
	{
		$today_devotion = $this->devotionService->getDevotionWhere('created_at', Carbon::today())->get()->first() ?? $this->devotionService->getDevotionWhere('id', rand(1, 10))->get()->first();
		$next_day_devotion = $this->devotionService->getDevotionWhere('created_at', Carbon::tomorrow())->get()->first() ?? $this->devotionService->getDevotionWhere('id', rand(1, 10))->get()->first();
		$users = $this->userService->getAllUser();
		$favorites = $this->favoriteService->getAll();
		$devotions = $this->devotionService->getAll();
		$categories = $this->devotionService->getCategories();

		return view('admin.pages.index', compact('users', 'devotions', 'categories', 'favorites', 'today_devotion', 'next_day_devotion'));
	}
}
