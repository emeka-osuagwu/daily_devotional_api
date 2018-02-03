<?php

namespace App\Http\Services;

use App\Models\User;

class UserService
{
	public function getAllUser()
	{
		return User::all();
	}

	public function getUserBy($field, $value)
	{
		return User::where($field, $value);
	}

	public function addUser($data)
	{
		
		$response = [];

		$check_user_email = $this->getUserBy('email', $data['email']);

		if ($check_user_email->count()) 
		{
			$check_user_email->update(['push_token' => $data['token']]);
			$response['message'] = 'user exits';
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
				'push_token' => $data['token']
			];

			$response['message'] = 'user create';
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

	public function addPushToken($data)
	{
		$user_check = $this->getUserBy('oauth', $data['oauth'])->get()->count();

		if (!$user_check) 
		{
			return 'user not found';
		}
		else 
		{
			
			$update = [
				'push_token' => $data['token']
			];

			$this->getUserBy('oauth', $data['oauth'])->update($update);

			return "token added";
		}
	}

	public function updateSubscriptionToken($email, $token)
	{
		$update = ['subscription_token' => $token];
		$this->getUserBy('email', $email)->update($update);
	}
}

?>