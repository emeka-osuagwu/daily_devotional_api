<?php

namespace App\Http\Services;

use Carbon\Carbon;
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

	public function getActiveSubscription()
	{
		$active_subscription_id = $this->activeSubscription()->first()->subscription_id;
		return Subscription::find($active_subscription_id);
	}

	public function createActiveSubscription($data)
	{
		$active_subscription_id = $this->activeSubscription()->first()->id;
		
		ActiveSubscription::where('id', $active_subscription_id)->update(['subscription_id' => $data['subscription_id']]);
	}

	public function createSubscription($data)
	{

		$create = [
			"title" => $data['title'],
			"price" => $data['price'] * 100,
			"start_date" => $data['start_date'],
			"end_date" => $data['end_date'],
			"subscription_token" => bcrypt($data['title'] . $data['start_date'] . Carbon::now())
		];

		return Subscription::create($create);
	}

	public function getSubscriptionBy($field, $value)
	{
		return Subscription::where($field, $value);
	}	

	public function deleteSubscription($id)
	{
		Subscription::destroy($id);
	}
}

?>