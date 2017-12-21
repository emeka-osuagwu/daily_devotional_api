<?php

namespace App\Http\Services;

use App\Models\Devotion;

class DevotionService
{
	public function getAll()
	{
		return Devotion::all();		
	}
}

?>