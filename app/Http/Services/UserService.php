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

	public function sendMessage($data)
	{
	    Mail::send('emails.user.reset_password_link', ['data' => $data], function ($message) use ($data) {
	        $message->from(env('MAIL_FROM_ADDRESS'), 'Password Reset');
	        $message->to($data['email'])->subject('Account Activation Link');
	    });
	}
}

?>