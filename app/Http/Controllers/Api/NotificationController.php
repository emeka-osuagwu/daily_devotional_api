<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Http\Services\NoteService;
use App\Http\Services\UserService;
use App\Http\Services\DevotionService;
use App\Http\Validations\NoteValidation;
use App\Http\Services\NotificationService;
use App\Http\Validations\DevotionValidation;

class NotificationController extends Controller
{

	protected $userService;
	protected $favoriteService;
	protected $notificationService;
	protected $devotionService;

	public function __construct
	(
		UserService $userService,
		DevotionService $devotionService,
		NotificationService $notificationService 
	)
	{
		$this->userService = $userService;
		$this->devotionService = $devotionService;
		$this->notificationService = $notificationService;
	}

	public function postSendNotification(Request $request)
	{
		// $users = $this->userService->getAllUser();
		// $devotion =  $this->devotionService->getAll()->first();

		// $notifications = [];

		// foreach($users as $key => $value) {
		// 	$notifications[] = [
		// 		'to' => $value['push_token'],
		// 		'title' => $devotion->title,
		// 		'body' => $devotion->description
		// 	];
		// }

		return $this->notificationService->emeka($request->all());
	}
}
