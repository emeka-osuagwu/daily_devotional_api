<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;

use App\Http\Services\UserService;
use App\Http\Services\DevotionService;
use App\Http\Services\SubscriptionService;
use App\Http\Validations\DevotionValidation;

class DevotionController extends Controller
{
	protected $userService;
	protected $devotionService;
	protected $subscriptionService;
	protected $devotionValidation;

	public function __construct
	(
		UserService $userService,
		DevotionService $devotionService,
		DevotionValidation $devotionValidation,
		SubscriptionService $subscriptionService
	)
	{
		$this->userService = $userService;
		$this->devotionService = $devotionService;
		$this->devotionValidation = $devotionValidation;
		$this->subscriptionService = $subscriptionService;
	}

	public function getBackInfo($id)
	{
		$user = $this->userService->getUserBy('id', $id)->get()->first();
		$devotions =  $this->devotionService->getDevotionWhere('created_at', Carbon::today())->get()->first() ?? $this->devotionService->getDevotionWhere('id', rand(1, 4))->get()->first();
		$categories = $this->devotionService->getCategories();

		$active_subscription_id = $this->subscriptionService->activeSubscription()->first();
		$active_subscription = $this->subscriptionService->getSubscriptionBy('id', $active_subscription_id->subscription_id)->get()->first();

		$response_data = [
			'data' => [
				"user" => $user,
				"active" => $devotions, 
				"categories" => $categories,
				"active_subscription" => $active_subscription
			],
			'status' => 200
		];

		return sendResponse($response_data, 200);
	}

	public function viewDevotionCategory($id)
	{
		$response_data = [
			'data' => $this->devotionService->getDevotionCategoryWhere('id', $id)->get(),
			'status' => 200
		];
		
		return sendResponse($response_data, 200);
	}

	public function viewDevotionCategories()
	{
		$response_data = [
			'data' => $this->devotionService->getCategories(),
			'status' => 200
		];

		return sendResponse($response_data, 200);
	}

	public function viewDevotion($id)
	{
		$response_data = [
			'data' => $this->devotionService->getDevotionWhere('id', $id)->get(),
			'status' => 200
		];	

		return sendResponse($response_data, 200);
	}

	public function viewDevotions()
	{
		$response_data = [
			'data' => $this->devotionService->getAll(),
			'status' => 200
		];

		return sendResponse($response_data, 200);
	}

	public function createDevotionCategory(Request $request)
	{
		$validator = $this->devotionValidation->createDovationCategory($request->all());

		if ($validator->fails()) 
		{
			$response_data = [
				'data' => $validator->errors(),
				'status' => 400
			];

			return sendResponse($response_data, 400);
		}

		$this->devotionService->createDovotionCategory($request);
		
		$response_data = [
			'status' => 200,
			'message' => 'category created'
		];

		return sendResponse($response_data, 200);
	}

	public function createDevotion(Request $request)
	{
		$validator = $this->devotionValidation->createDovation($request->all());

		if ($validator->fails()) 
		{
			$response_data = [
				'data' => $validator->errors(),
				'status' => 400
			];

			return sendResponse($response_data, 400);
		}

		$this->devotionService->createDevotion($request);
		
		$response_data = [
			'message' => 'contented created',
			'status' => 200
		];

		return sendResponse($response_data, 200);
	}

	public function updateDevotionCagetory(Request $request, $id)
	{
		$validator = $this->devotionValidation->updateDovation($request->all(), $id);

		if ($validator->fails()) 
		{
			$response_data = [
				'data' => $validator->errors(),
				'status' => 400
			];

			return sendResponse($response_data, 400);
		}

		$this->devotionService->updateDevotionCategory($request, (int) $request->id);

		$response_data = [
			'message' => 'devotion category updated',
			'status' => 200
		];

		return sendResponse($response_data, 200);	
	}

	public function updateDevotion(Request $request, $id)
	{
		$validator = $this->devotionValidation->updateDovation($request->all(), $id);

		if ($validator->fails()) 
		{
			$response_data = [
				'data' => $validator->errors(),
				'status' => 400
			];

			return sendResponse($response_data, 400);
		}

		$this->devotionService->updateDevotion($request, (int) $request->id);

		$response_data = [
			'message' => 'devotion updated',
			'status' => 200
		];

		return sendResponse($response_data, 200);	
	}

	public function deleteDevotion($id)
	{
		$this->devotionService->deleteDevotion($id);

		$response_data = [
			'message' => 'devotion deleted',
			'status' => 200
		];

		return sendResponse($response_data, 200);
	}

	public function deleteDevotionCategory($id)
	{
		$this->devotionService->deleteDevotionCategory($id);

		$response_data = [
			'message' => 'devotion category deleted',
			'status' => 200
		];

		return sendResponse($response_data, 200);
	}

	public function favoriteDovotion($value='')
	{
		# code...
	}

	public function viewDevotionDay($date)
	{
		$response_data = [
			'data' => $this->devotionService->findByDate($date)->get()->first() ?? $this->devotionService->getDevotionWhere('id', rand(1, 20))->get()->first(),
			'status' => 200
		];

		return sendResponse($response_data, 200);
	}

	public function unfavoriteDovotion($value='')
	{
	}
}
