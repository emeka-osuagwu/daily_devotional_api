<?php

namespace App\Http\Services;

use Excel;
use App\Models\User;
use App\Models\Subscription;
use App\Http\Services\SubscriptionService;

class UserService
{
	public function __construct
	(
		SubscriptionService $subscriptionService
	)
	{
		$this->subscriptionService = $subscriptionService;
	}

	public function getAllUser()
	{
		return User::all();
	}

	public function getAdminUsers()
	{
		return User::where('role', 'admin');
	}

	public function getUserBy($field, $value)
	{
		return User::where($field, $value);
	}

	public function addUser($data)
	{
		$response = [];

		$check_user_email = $this->getUserBy('oauth', $data['oauth']);

		if ($check_user_email->count()) 
		{
			$response['message'] = 'user_exits';
			$response['data'] = $check_user_email->first();
		}
		else
		{
			$create = [
				'email' => $data['email'],
				'oauth' => $data['oauth'],
				'image' => $data['image'],
				'name' => $data['name'],
				'password' => bcrypt($data['oauth']),
				'platform_name' => $data['platform_name'],
				'account_type' => $data['account_type'],
			];

			$response['message'] = 'user_created';
			$response['data'] = User::create($create);
		}
		
		$response['status'] = 200;
		return $response;
	}

	public function sendMessage($data)
	{
	    Mail::send('emails.user.reset_password_link', ['data' => $data], function ($message) use ($data) {
	        $message->from(env('MAIL_FROM_ADDRESS'), 'Password Reset');
	        $message->to($data['email'])->subject('Account Activation Link');
	    });
	}

	public function updatePushToken($data)
	{
		$user_check = $this->getUserBy('id', $data['id'])->get()->count();

		if (!$user_check) 
		{
			return 'user not found';
		}
		else 
		{
			$update = [
				'push_token' => $data['push_token']
			];

			$this->getUserBy('id', $data['id'])->update($update);

			return "token added";
		}
	}

	public function updateSubscriptionToken($id, $token)
	{
		$update = ['subscription_token' => $token];
		$this->getUserBy('id', $id)->update($update);
		return $this->getUserBy('id', $id)->get();
	}

	public function bulkActiveUsers($file)
	{
		Excel::load($file, function($reader) {

			$reader->each(function($sheet) {
				
				if ($sheet['email']) {
					
					$user_exist = User::where("email", $sheet['email'])->get();

					if ($user_exist->count() > 0) 
					{
						$token = $this->subscriptionService->getActiveSubscription()->subscription_token;
						$this->updateSubscriptionToken('email', $token);
					}
				}

			});

		})->get();
	}

	public function updateUserHeler($id, $f, $v)
	{

		$update = [
			$f => $v
		];

		return $this->getUserBy('id', $id)->update($update);
	}
}

?>