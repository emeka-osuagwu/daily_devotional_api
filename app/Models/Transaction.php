<?php

namespace App\Models;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

	// protected $table = "favorites";
	
	protected $fillable = [
		'user_id',
		'amount',
		'currency',
		'status',
		'channel',
		'message',
		'payment_refrence',
		'authorization_code',
		'customer_code',
		'customer_email',
		'transaction_date',
		'transaction_id',
	];

	public function getCreatedAtAttribute($value)
	{
	    return Carbon::parse($value)->diffForHumans();
	}
}
