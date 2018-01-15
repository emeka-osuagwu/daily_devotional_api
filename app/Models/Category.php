<?php

namespace App\Models;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

	protected $fillable = [
		'title',
		'description',
		'cover_image',
	];

	public function getCreatedAtAttribute($value)
	{
	    return Carbon::parse($value)->diffForHumans();
	}

	public function devotions()
	{
	    return $this->hasMany('App\Models\Devotion', 'category_id')->take(10);
	}
}
