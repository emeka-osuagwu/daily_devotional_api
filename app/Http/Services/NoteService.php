<?php

namespace App\Http\Services;

use App\Models\Note;

class NoteService
{
	public function getAll()
	{
		return Note::all();
	}

	public function createNote($data)
	{
		return Note::create($data);
	}

	public function updateNote($data, $id)
	{
		Note::where('id', $id)->update($data);
	}
}

?>