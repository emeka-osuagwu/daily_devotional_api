<?php

namespace App\Models;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{

	// protected $table = 'subscriptions';

	protected $fillable = [
		'price',
		'start_date',
		'end_date',
		'subscription_token',
		'description',
		'title',
		'image'
	];

	public function getCreatedAtAttribute($value)
	{
	    return Carbon::parse($value)->diffForHumans();
	}
}
