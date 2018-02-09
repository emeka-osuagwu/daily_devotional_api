<?php

namespace App\Http\Validations;

use Validator;

class SubscriptionValidation
{
	public function createSubscription($data)
	{	
		$validator = Validator::make($data, [
			'title'	=> 'required|unique:devotions|string',
			'price' => 'required',
			'start_date' => 'required',
			'end_date' => 'required',
		]);

		return $validator;
	}

}

?>