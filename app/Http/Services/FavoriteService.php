<?php

namespace App\Http\Services;

use App\Models\Favorite;

class FavoriteService
{
	public function getFavoritesBy($field, $value)
	{
		return Favorite::where($field, $value);
	}

	public function unfavoriteDevtion($id)
	{
		return Favorite::destroy($id);
	}

}

?>