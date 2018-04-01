<?php

namespace App\Models;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Cashier;

class Subscription extends Model
{
	protected $fillable = [
		'price',
		'start_date',
		'end_date',
		'subscription_token',
		'description',
		'title',
		'image'
	];

	public function getPriceAttribute($value)
	{
		Cashier::useCurrency('usd', '₦');
	    return Cashier::formatAmount($value);
	}

	public function getCreatedAtAttribute($value)
	{
	    return Carbon::parse($value)->diffForHumans();
	}
}
