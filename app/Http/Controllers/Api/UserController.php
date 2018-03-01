<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;

use App\Http\Services\UserService;
use App\Http\Services\MailService;
use App\Http\Services\SocialiteService;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{
	protected $userService;
	protected $mailService;
	protected $socialiteService;

	public function __construct
	(
		UserService $userService,
		MailService $mailService,
		SocialiteService $socialiteService
	)
	{
		$this->userService = $userService;
		$this->mailService = $mailService;
		$this->socialiteService = $socialiteService;
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
			'data' => $this->userService->getUserBy('id', $id)->get()->first(),
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

	public function updatePushToken(Request $request)
	{
		$response_data = [
			'data' => $this->userService->updatePushToken($request->all()),
			'status' => 200
		];

		return sendResponse($response_data, 200);
	}

	public function updateUserHelper($id, $f, $v)
	{
		return $this->userService->updateUserHeler($id, $f, $v);
	}

	public function socialLogin($platform)
	{
	   return $this->socialiteService->redirect($platform);
	}

	public function socialLoginCallback($platform, Request $request)
	{
		$user = collect(Socialite::driver( $platform )->user());
		return $user;
	}
	
}
