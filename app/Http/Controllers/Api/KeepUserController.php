<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

class UserController extends Controller
{
	public function welcome()
	{
		return "welcome to devotion version 1 api";
	}
}
