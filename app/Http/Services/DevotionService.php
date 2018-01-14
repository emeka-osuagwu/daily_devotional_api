<?php

namespace App\Http\Services;

use Excel;
use App\Models\Devotion;
use App\Models\Category;
use App\Http\Services\FileUploadService;

class DevotionService
{
	/*
	|--------------------------------------------------------------------------
	| Devotion
	|--------------------------------------------------------------------------
	*/
	public function getAll()
	{
		return Devotion::all();		
	}

	public function getPaginated($amount)
	{
		return Devotion::paginate($amount);		
	}

	public function createDevotion($data)
	{
		$create = $data->all();

		if ($data->has('cover_image'))
		{
		    $create['cover_image'] = $this->fileUploadService->toCloudinary($data->file('cover_image'));
		}		

		return Devotion::create($create);
	}

	public function getDevotionWhere($field, $value)
	{
		return Devotion::where($field, $value);
	}

	public function getDevotionWhereIn($field, $values)
	{
		return Devotion::whereIn($field, $values);
	}

	public function updateDevotion($data, $id)
	{
		$create = $data->all(); 

		if ($data->has('cover_image')) {
			$create['cover_image'] = $this->fileUploadService->toCloudinary($data->file('cover_image'));
		}

		return Devotion::where('id', $id)->update($create);
	}

	public function deleteDevotion($id)
	{
		return Devotion::destroy($id);
	}

	public function bulkUploadDevotion($file, $category)
	{
		Excel::load($file, function($reader) {

			$reader->each(function($sheet) {
				if ($sheet['title']) {
					$data = [
						"type" => 'text',
						"content_url" => trim($sheet['content_url']),
						"content_id" => null,
						
						"title" => trim($sheet['title']),
						"cover_image" => null,
						"description" => trim($sheet['description']),
						"body" => trim($sheet['body']),
						"confession" => trim($sheet['confession']),
						"prayer" => trim($sheet['prayer']),
						"further_reading" => trim($sheet['further_reading']),
						"bible_verse" => trim($sheet['bible_verse']),
						
						"category_id" => rand(1, 2),
					];
					Devotion::create($data);
				}
			});
		})->get();

		Excel::load($category, function($reader) {
			// $reader->ignoreEmpty();
			$reader->each(function($sheet) {

				if ($sheet['title']) {
					$data = [
						"title" => trim($sheet['title']),
						"description" => trim($sheet['description']),
						"cover_image" => Url('pic') . '/' . trim($sheet['cover_image']) . '.jpeg',
					];
					
					// echo json_encode($data);
					Category::create($data);
				}
			});
		})->get();

		return true;
	}

	public function findByDate($date)
	{
		return Devotion::all();
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

	public function getDevotionCategoryWhere($field, $value)
	{
		return Category::with('devotions')->where($field, $value);
	}

	public function deleteDevotionCategory($id)
	{
		return Category::destroy($id);
	}

	public function updateDevotionCategory($data, $id)
	{
		$create = $data->all(); 

		if ($data->has('cover_image')) {
			$create['cover_image'] = $this->fileUploadService->toCloudinary($data->file('cover_image'));
		}

		return Category::where('id', $id)->update($create);
	}
}

?>