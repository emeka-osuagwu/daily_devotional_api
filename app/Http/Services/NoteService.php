<?php

namespace App\Http\Services;

use App\Models\Note;

class NoteService
{
	public function getAll()
	{
		return Note::all();
	}

	public function getNoteBy($field, $value)
	{
		return Note::where($field, $value);
	}

	public function createNote($data)
	{
		return Note::create($data);
	}

	public function updateNote($data, $id)
	{
		Note::where('id', $id)->update($data);
	}

	public function deleteNote($id)
	{
		Note::destroy($id);
	}
}

?>