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
		$user_check = $this->getUserBy('oauth', $data['oauth'])->get()->count();
		
		if ($user_check > 0) 
		{
			return 'user exist';
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
				'account_type' => $data['account_type']
			];

			User::create($create);

			return 'user create';
		}
	}

	public function sendMessage($data)
	{
	    Mail::send('emails.user.reset_password_link', ['data' => $data], function ($message) use ($data) {
	        $message->from(env('MAIL_FROM_ADDRESS'), 'Password Reset');
	        $message->to($data['email'])->subject('Account Activation Link');
	    });
	}
}

?>