<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;

use App\Http\Services\DevotionService;
use App\Http\Validations\DevotionValidation;

class DevotionController extends Controller
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

	public function unfavoriteDovotion($value='')
	{
		# code...
	}

	public function bulkUploadDevotion(Request $request)
	{
		$this->devotionService->bulkUploadDevotion($request->file('file'));

		$response_data = [
			'status' => 200,
			'message' => 'upload successful'
		];

		return sendResponse($response_data, 200);
	}
}
