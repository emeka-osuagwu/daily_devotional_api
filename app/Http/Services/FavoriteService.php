<?php

namespace App\Http\Services;

use App\Models\Favorite;

class FavoriteService
{
	public function getFavoritesBy($field, $value)
	{
		return Favorite::where($field, $value);
	}

	public function likeDevotion($data)
	{
		$create = [
			'devotion_id' => (int) $data['devotion_id'],
			'user_id' => $data['user_id']
		];

		return Favorite::create($create);
	}

	public function unfavoriteDevtion($id)
	{
		return Favorite::destroy($id);
	}

}

?>