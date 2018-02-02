<?php

namespace App\Models;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Subcription extends Model
{
	protected $fillable = [
		'price',
		'start_date',
		'end_date',
		'subscription_token',
		'description',
		'image'
	];

	public function getCreatedAtAttribute($value)
	{
	    return Carbon::parse($value)->diffForHumans();
	}
}
