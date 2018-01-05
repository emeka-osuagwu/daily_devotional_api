<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Category;

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

	protected $appends = [
		'category'
	];

	public function getCreatedAtAttribute($value)
	{
	    return Carbon::parse($value)->diffForHumans();
	}

	public function getCategoryAttribute()
	{ 
		return Category::where('id', $this->category_id)->first();
	}

	public function category()
	{
	    return $this->belongsTo('App\Models\Category', 'id');
	}

}
