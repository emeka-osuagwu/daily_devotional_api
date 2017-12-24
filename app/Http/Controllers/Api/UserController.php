<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;

use App\Http\Services\UserService;

class UserController extends Controller
{
	protected $userService;

	public function __construct
	(
		UserService $userService
	)
	{
		$this->userService = $userService;
	}

	public function getAllUser()
	{
		$response_data = [
			'data' => $this->userService->getAllUser(),
			'status' => 200
		];

		return sendResponse($response_data, 200);
	}

	public function getUser($id)
	{
		$response_data = [
			'data' => $this->userService->getUserBy('id', $id)->get(),
			'status' => 200
		];

		return sendResponse($response_data, 200);
	}
}
