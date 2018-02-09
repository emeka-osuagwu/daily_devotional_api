<?php

namespace App\Http\Controllers\Web;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Web\Controller;
;
use App\Http\Services\DevotionService;
use App\Http\Services\SubscriptionService;

use App\Http\Validations\SubscriptionValidation;

class SubscriptionController extends Controller
{
	protected $devotionService;
	protected $subscriptionService;
	protected $subscriptionValidation;

	public function __construct
	(
		DevotionService $devotionService,
		SubscriptionService $subscriptionService,
		SubscriptionValidation $subscriptionValidation
	)
	{
		$this->devotionService = $devotionService;
		$this->subscriptionService = $subscriptionService;
		$this->subscriptionValidation = $subscriptionValidation;
	}
	
	public function getSubscriptions()
	{
		$subscriptions = $this->subscriptionService->getAllSubscriptions();
		return view('admin.pages.subscriptions', compact('subscriptions'));
	}

	public function getCreateSubscription()
	{
		return view('admin.pages.create_subscription');
	}
}