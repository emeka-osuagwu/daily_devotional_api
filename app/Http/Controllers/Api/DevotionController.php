<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;

use App\Http\Services\DevotionService;

class DevotionController extends Controller
{

	protected $devotionService;

	public function __construct
	(
		DevotionService $deleteDevotion 
	)
	{
		$this->devotionService = $deleteDevotion;
	}

	public function viewDevotionCategory($value='')
	{
		# code...
	}

	public function viewDevotionCategories($value='')
	{
		# code...
	}

	public function viewDevotion($value='')
	{
		return  [];	
	}

	public function viewDevotions()
	{
		return $this->devotionService->getAll();
	}

	public function createDevotionCategory($value='')
	{
		# code...
	}

	public function createDevotion($value='')
	{
		# code...
	}

	public function updateDevotion($value='')
	{
		# code...
	}

	public function updateDevotionCagetory($value='')
	{
		# code...
	}

	public function deleteDevotion($value='')
	{
		# code...
	}

	public function deleteDevotionCategory($value='')
	{
		# code...
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
