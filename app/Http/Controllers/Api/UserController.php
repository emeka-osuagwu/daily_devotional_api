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

	public function getUser($email)
	{
		$response_data = [
			'data' => $this->userService->getUserBy('email', $email)->get()->first(),
			'status' => 200
		];

		return sendResponse($response_data, 200);
	}

	public function addUser(Request $request)
	{
		return sendResponse($this->userService->addUser($request->all()), 200);
	}

	public function sendFeedback(Request $request)
	{
		$user = $this->userService->getUserBy('oauth', $request->user_id)->get();
		$request['user'] = $user->first();

		$this->mailService->sendMessage($request->all());
	
		$response_data = [
			'message' => 'message sent',
			'status' => 200
		];

		return sendResponse($response_data, 200);
	}

	public function postDeleteUser($id)
	{
		$this->userService->getUserBy('id', $id)->delete();
		return 'done';
	}

	
}
