<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;

use App\Http\Services\UserService;
use App\Http\Services\MailService;

class UserController extends Controller
{
	protected $userService;
	protected $mailService;

	public function __construct
	(
		UserService $userService,
		MailService $mailService
	)
	{
		$this->userService = $userService;
		$this->mailService = $mailService;
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

	public function sendFeedback(Request $request)
	{
		$this->mailService->sendMessage($request->all());
	
		$response_data = [
			'message' => 'message sent',
			'status' => 200
		];

		return sendResponse($response_data, 200);
	}
}
