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

	public function postCreateSubscription(Request $request)
	{

		$validator = $this->subscriptionValidation->createSubscription($request->all());

		if ($validator->fails()) 
		{
			return back()->withErrors($validator->errors());
		}

		$this->subscriptionService->createSubscription($request->all());
		session()->flash('subscriptions-successful-created', 'alert');
		return redirect('subscriptions');
	}

	public function getDeleteSubscription($id)
	{
		$acive_subscription = $this->subscriptionService->activeSubscription()->first();

		if ($acive_subscription->subscription_id == $id) 
		{
			session()->flash('cant-delete-active-subscription', 'alert');
			return back();
		}

		$this->subscriptionService->deleteSubscription($id);
		session()->flash('delete-subscription-successful', 'alert');
		return back();
	}

	public function getActiveSubscription()
	{
		$subscriptions = $this->subscriptionService->getAllSubscriptions();
		return view('admin.pages.select_active_subscription', compact('subscriptions'));
	}

	public function postActivateSubscription(Request $request)
	{
		$this->subscriptionService->createActiveSubscription($request->all());
		session()->flash('active-subscription-successful-changed', 'alert');
		return back();
	}

}
