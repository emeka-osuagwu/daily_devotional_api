<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Services\NoteService;
use App\Http\Validations\NoteValidation;
use App\Http\Services\NotificationService;
use App\Http\Validations\DevotionValidation;

class NotificationController extends Controller
{

	protected $favoriteService;
	protected $notificationService;

	public function __construct
	(
		NotificationService $notificationService 
	)
	{
		$this->notificationService = $notificationService;
	}

	public function postSendNotification(Request $request)
	{
		return $this->notificationService->emeka($request->all());
	}
}
