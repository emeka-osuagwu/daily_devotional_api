<?php

namespace App\Models;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{

	protected $table = "favorites";
	
	protected $fillable = [
		'user_id',
		'devotion_id',
	];

	public function getCreatedAtAttribute($value)
	{
	    return Carbon::parse($value)->diffForHumans();
	}
}
