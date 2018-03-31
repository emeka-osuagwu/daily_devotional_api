<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Web\Controller;

use App\Http\Services\UserService;
use App\Http\Services\FavoriteService;
use App\Http\Services\DevotionService;
use App\Http\Services\FileUploadService;
use App\Http\Validations\DevotionValidation;

class CategoryController extends Controller
{

	protected $userService;
	protected $favoriteService;
	protected $devotionService;
	protected $fileUploadService;
	protected $devotionValidation;

	public function __construct
	(
		UserService $userService,
		DevotionService $devotionService,
		FavoriteService $favoriteService,
		FileUploadService $fileUploadService,
		DevotionValidation $devotionValidation 
	)
	{
		$this->userService = $userService;
		$this->favoriteService = $favoriteService;
		$this->devotionService = $devotionService;
		$this->fileUploadService = $fileUploadService;
		$this->devotionValidation = $devotionValidation;
	}
	
	public function getCategories($value='')
	{
		$categories = $this->devotionService->getCategories();
		return view('admin.pages.categories', compact('categories'));
	}

	public function createCategory()
	{
		return view('admin.pages.create_category');
	}

	public function postCreateCategory(Request $request)
	{
		$validator = $this->devotionValidation->createDovationCategory($request->all());

		if ($validator->fails()) 
		{
			return back()->withErrors($validator->errors());
		}

		$category =  $this->devotionService->createDovotionCategory($request);
		session()->flash('category-successful-created', 'alert');
		return redirect('category/' . $category->id);
	}


	public function editCategory($id)
	{
		$category = $this->devotionService->getDevotionCategoryWhere('id', $id)->first();
		return view('admin.pages.edit_category', compact('category'));
	}

	public function postUpdateCreateCategory(Request $request)
	{
		$this->devotionService->updateDevotionCategory($request);
		session()->flash('category-successful-updated', 'alert');
		return redirect('category/' . $request['category_id']);
	}

	public function uploadCategory(Request $request)
	{
		$this->devotionService->bulkUploadCategory($request->file);
		session()->flash('category-successful-uploaded', 'alert');
		return redirect('categories');
	}

	public function deleteCategory($id)
	{
		$this->devotionService->deleteDevotionCategory($id);
		session()->flash('category-successful-deleted', 'alert');
		return redirect('categories');
	}
}
