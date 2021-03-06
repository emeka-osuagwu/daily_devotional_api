<?php

namespace App\Http\Controllers\Web;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Web\Controller;

use App\Http\Services\UserService;
use App\Http\Services\DevotionService;
use App\Http\Services\NotificationService;
use App\Http\Services\SubscriptionService;

use App\Http\Validations\SubscriptionValidation;

class SubscriptionController extends Controller
{
	protected $userService;
	protected $devotionService;
	protected $subscriptionService;
	protected $subscriptionValidation;

	public function __construct
	(
		UserService $userService,
		DevotionService $devotionService,
		NotificationService $notificationService,
		SubscriptionService $subscriptionService,
		SubscriptionValidation $subscriptionValidation
	)
	{
		$this->userService = $userService;
		$this->devotionService = $devotionService;
		$this->subscriptionService = $subscriptionService;
		$this->notificationService = $notificationService;
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

		$admin_users_id = $this->userService->getUserBy('role', 'admin')->get()->pluck('id');
		$users = $this->userService->getAllUser()->except($admin_users_id->toArray());

		$notifications = [];

		foreach($users as $key => $value) {

			if (!$value->push_token == '' || !$value->push_token == null) {
				$notifications[] = [
					'to' => $value->push_token,
					// 'to' => "ExponentPushToken[EvxCbHMi4ago2MK_wZQjMd]",
					'title' => "Devotion Subscription",
					'body' => "Subscribe for least devotion :)",
					"data" => json_encode([
						'action' => 'new_subscription_update',
						'subscription' => $this->subscriptionService->getActiveSubscription()
					])
				];
			}

		}

		$this->notificationService->emeka($notifications);
		session()->flash('active-subscription-successful-changed', 'alert');
		return back();
	}

	public function getActiveUserSubscription()
	{
		$users = $this->userService->getAllUser();
		return view('admin.pages.activate_users', compact('users'));
	}

	public function postActiveUserSubscription(Request $request)
	{
		$active_subscription = $this->subscriptionService->getActiveSubscription();
		$user = $this->userService->updateSubscriptionToken($request->user_id, $active_subscription->subscription_token)->first();

		$notification_data = [
			"to" => $user->push_token,
			// "to" => "ExponentPushToken[p5s5frA1mu24HQgSHX9wfZ]",
			"body" => "Hi " . $user->name . '. You have been rewarded with ' . $active_subscription->title . '.:)',
			"title" => "Free Subscription Activation",
			"data" => json_encode([
				'user' => $user,
				'action' => 'free_subscription'
			])
		];

		$this->notificationService->emeka($notification_data);

		session()->flash('user-activated-successful', 'alert');
		
		return back();
	}

	public function postActiveUserUpload(Request $request)
	{
		$this->userService->bulkActiveUsers($request->file);
		session()->flash('user-activated-successful', 'alert');
		return back();
	}

}
