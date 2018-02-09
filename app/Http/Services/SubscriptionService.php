<?php

namespace App\Http\Services;

use App\Models\Subscription;
use App\Models\ActiveSubscription;

class SubscriptionService
{

	public function getAllSubscriptions()
	{
		return Subscription::all();
	}

	public function activeSubscription()
	{
		return ActiveSubscription::all();
	}

	public function getSubscriptionBy($field, $value)
	{
		return Subscription::where($field, $value);
	}	
}

?>