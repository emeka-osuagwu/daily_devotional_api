<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Services\NoteService;
use App\Http\Services\DevotionService;
use App\Http\Validations\NoteValidation;
use App\Http\Validations\DevotionValidation;

class NoteController extends Controller
{

	protected $noteService;
	protected $noteValidation;
	protected $devotionService;
	protected $devotionValidation;

	public function __construct
	(
		NoteService $noteService,
		NoteValidation $noteValidation,
		DevotionService $devotionService,
		DevotionValidation $devotionValidation 
	)
	{
		$this->noteService = $noteService;
		$this->noteValidation = $noteValidation;
		$this->devotionService = $devotionService;
		$this->devotionValidation = $devotionValidation;
	}

	public function getAllNotes()
	{
		$response_data = [
			'data' => $this->noteService->getAll(),
			'status' => 200
		];

		return sendResponse($response_data, 200);
	}

	public function getNote($value='')
	{
		# code...
	}

	public function addNote(Request $request)
	{
		$validator = $this->noteValidation->createNote($request->all());

		if ($validator->fails()) 
		{
			$response_data = [
				'data' => $validator->errors(),
				'status' => 400
			];

			return sendResponse($response_data, 400);
		}
			
		$response_data = [
			'data' => $this->noteService->createNote($request->all()),
			'status' => 200
		];

		return sendResponse($response_data, 200);
	}

	public function updateNote(Request $request, $id)
	{
		$validator = $this->noteValidation->updateNote($request->all(), $id);

		if ($validator->fails()) 
		{
			$response_data = [
				'data' => $validator->errors(),
				'status' => 400
			];

			return sendResponse($response_data, 400);
		}

		$this->noteService->updateNote($request->all(), $id);

		$response_data = [
			'message' => 'note updated',
			'status' => 200
		];

		return sendResponse($response_data, 200);
	}

	public function deleteNote($id)
	{
	}
}
