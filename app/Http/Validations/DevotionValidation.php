<?php

namespace App\Http\Validations;

use Validator;

class DevotionValidation
{
	public function createDovation($data)
	{	
		$validator = Validator::make($data, [
			'title'	=> 'required|unique:devotions|alpha_num',
			'description' => 'required|:devotions|alpha_num',
			'body' => 'required|:devotions|alpha_num',
			'confession' => 'required|:devotions|alpha_num',
			'prayer' => 'required|:devotions|alpha_num',
			'further_reading' => 'required|:devotions|alpha_num',
			'bible_verse' => 'required:devotions|alpha_num',
			'category_id' => 'required:devotions|integer',
			'cover_image' => 'required_if:section,cover_image|image|mimes:jpg,png,jpeg',
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