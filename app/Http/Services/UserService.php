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
}

?>