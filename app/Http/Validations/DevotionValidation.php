<?php

namespace App\Http\Validations;

use Validator;

class DevotionValidation
{
	public function createDovation($data)
	{	
		$validator = Validator::make($data, [
			'title'	=> 'required|unique:devotions|alpha_num',
			'description' => 'required|alpha_num',
		]);

		return $validator;
	}

	public function createDovationCategory($data)
	{	
		$validator = Validator::make($data, [
			'title'	=> 'required|unique:categories|alpha_num',
			'description' => 'required|alpha_num',
			'cover_image' => 'required_if:section,cover_image|image|mimes:jpg,png,jpeg',
		]);

		return $validator;
	}

}

?>