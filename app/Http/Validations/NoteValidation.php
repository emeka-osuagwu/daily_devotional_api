<?php

namespace App\Http\Validations;

use Validator;

class NoteValidation
{
	public function createNote($data)
	{	
		$validator = Validator::make($data, [
			'title'	=> 'required|unique:notes|string',
			'note' => 'required|string',
			'user_id' => 'required',
		]);

		return $validator;
	}

	public function updateNote($data, $id)
	{	
		$data['id'] = (int) $id;

		$validator = Validator::make($data, [
			'id'	=> 'required|exists:notes|integer',
			'note'	=> 'required_if:section,note|string',
			'title'	=> 'required_if:section,title|string|unique:notes',
			'user_id'	=> 'required_if:section,user_id|string',
		]);

		return $validator;
	}
}

?>