<?php

namespace App\Http\Services;

use Excel;
use App\Models\Devotion;
use App\Models\Category;
use App\Http\Services\FileUploadService;

class DevotionService
{

	public function __construct()
	{
		$this->fileUploadService = new FileUploadService;
	}

	/*
	|--------------------------------------------------------------------------
	| Devotion
	|--------------------------------------------------------------------------
	*/
	public function getAll()
	{
		return Devotion::all();		
	}

	public function createDevotion($data)
	{
		$create = $data->all();

		if ($data->has('cover_image'))
		{
		    $create['cover_image'] = $this->fileUploadService->toCloudinary($data->file('cover_image'));
		}		

		Devotion::create($create);
	}

	public function getDevotionWhere($field, $value)
	{
		return Devotion::where($field, $value);
	}

	public function bulkUploadDevotion($file)
	{
		Excel::load($file, function($reader) {

			$reader->each(function($sheet) {
				$data = [
					"type" => trim($sheet['type']),
					"content_url" => trim($sheet['content_url']),
					"content_id" => trim($sheet['content_id']),
					
					"title" => trim($sheet['title']),
					"cover_image" => trim($sheet['cover_image']),
					"description" => trim($sheet['description']),
					"body" => trim($sheet['body']),
					"confession" => trim($sheet['confession']),
					"prayer" => trim($sheet['prayer']),
					"further_reading" => trim($sheet['further_reading']),
					"bible_verse" => trim($sheet['bible_verse']),
					
					"category_id" => trim($sheet['category_id']),
				];
				Devotion::create($data);
			});
		})->get();

		return true;
	}

	/*
	|--------------------------------------------------------------------------
	| Category
	|--------------------------------------------------------------------------
	*/
	public function createDovotionCategory($data)
	{
		$create = [
			'title' => $data['title'],
			'description' => $data['description']
		];

		if ($data->has('cover_image'))
		{
		    $create['cover_image'] = $this->fileUploadService->toCloudinary($data->file('cover_image'));
		}

		return Category::create($create);
	}

	public function getCategories()
	{
		return Category::all();
	}

}

?>