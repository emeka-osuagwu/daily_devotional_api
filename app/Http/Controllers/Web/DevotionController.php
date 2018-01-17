<?php

namespace App\Http\Controllers\Web;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Web\Controller;

use App\Http\Services\UserService;
use App\Http\Services\FavoriteService;
use App\Http\Services\DevotionService;
use App\Http\Services\FileUploadService;
use App\Http\Validations\DevotionValidation;

class DevotionController extends Controller
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
	
	public function getCreateDevotion(Request $request)
	{
		$categories = $this->devotionService->getCategories();
		return view('admin.pages.create_devotion', compact('categories'));
	}	

	public function editDevotion($id)
	{
		$devotion = $this->devotionService->getDevotionWhere('id', $id)->get()->first();
		$categories = $this->devotionService->getCategories();
		return view('admin.pages.edit_devotion', compact('categories', 'devotion'));
	}

	public function updateDevotion(Request $request)
	{
		$this->devotionService->updateDevotion($request);
		session()->flash('devotion-successful-updated', 'alert');
		return redirect('devotion/' . $request['devotion_id']);
	}

	public function postCreateDevotion(Request $request)
	{
		$validator = $this->devotionValidation->createDovation($request->all());

		if ($validator->fails()) 
		{
			return back()->withErrors($validator->errors());
		}

		$devotion =  $this->devotionService->createDevotion($request);
		session()->flash('devotion-successful-created', 'alert');
		return redirect('devotion/' . $devotion->id);
	}

	public function getDevotions()
	{
		$devotions = $this->devotionService->getPaginated(30);
		return view('admin.pages.devotions', compact('devotions'));
	}

	public function getDevotion($id)
	{
		$devotion = $this->devotionService->getDevotionWhere('id', $id)->get()->first();
		return view('admin.pages.devotion', compact('devotion'));
	}

	public function deleteDevotion($id)
	{
		$this->devotionService->deleteDevotion($id);
		return redirect('devotions');
	}

	public function postUploadDevotion(Request $request)
	{
		$this->devotionService->bulkUploadDevotion($request->file);
		session()->flash('devotion-successful-uploaded', 'alert');
		return redirect('devotions');
	}

	public function getCalenderFilter(Request $request)
	{
		$search = false;
		$devotion = collect([]);

		if ($request->has('date') && $request->date != '' ) 
		{
			$search = true;
			$devotion = $this->devotionService->getDevotionWhere('created_at', $request->date)->get();
		}
		
		return view('admin.pages.devotion_calender', compact('devotion', 'search'));
	}
}
