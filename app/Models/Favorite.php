<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Category;

use Illuminate\Database\Eloquent\Model;

class Devotion extends Model
{
    
	protected $fillable = [
		'user_id',
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

}
