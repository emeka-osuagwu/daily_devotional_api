<?php

namespace App\Http\Validations;

use Validator;

class DevotionValidation
{
	public function createDovation($data)
	{	
		$validator = Validator::make($data, [
			'title'	=> 'required|unique:devotions|string',
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
			'title'	=> 'required|unique:categories|string',
			'description' => 'required|string',
			'cover_image' => 'required_if:section,cover_image|image|mimes:jpg,png,jpeg',
		]);

		return $validator;
	}

	public function updateDovation($data, $id)
	{	
		$data['id'] = $id;

		$validator = Validator::make($data, [
			'id' => 'required|integer|exists:devotions',
			'type' => 'required_if:section,type|string',
			'title'	=> 'required_if:section,title|string|unique:devotions',
			'description' => 'required_if:section,description|string',
			'cover_image' => 'required_if:section,cover_image|image|mimes:jpg,png,jpeg',
			'body' => 'required_if:section,body|string',
			'further_reading' => 'required_if:section,further_reading|string',
			'confession' => 'required_if:section,confession|string',
			'confession' => 'required_if:section,confession|string',
			'prayer' => 'required_if:section,prayer|string',
			'further_reading' => 'required_if:section,further_reading|string',
			'bible_verse' => 'required_if:section,bible_verse|string',
			'category_id' => 'required_if:section,category_id|integer',
		]);

		return $validator;
	}

	public function updateDovationCategory($data, $id)
	{	
		$data['id'] = $id;

		$validator = Validator::make($data, [
			'id' => 'required|integer|exists:categories',
			'title'	=> 'required_if:section,title|string',
			'description' => 'required_if:section,description|string',
			'cover_image' => 'required_if:section,cover_image|image|mimes:jpg,png,jpeg',
		]);

		return $validator;
	}

}

?>