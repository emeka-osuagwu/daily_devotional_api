<?php

namespace App\Models;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Devotion extends Model
{
    
	protected $fillable = [
		'type',
		'content_url',
		'content_id',

		'title',
		'cover_image',
		'description',
		'body',
		'confession',
		'prayer',
		'further_reading',
		'bible_verse',
		
		'category_id',
	];

	public function getCreatedAtAttribute($value)
	{
		
	    return Carbon::parse($value)->diffForHumans();
	}

}
