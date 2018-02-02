<?php

namespace App\Models;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class ActiveSubscription extends Model
{

	protected $table = 'active_subscription';

	protected $fillable = [
		'subscription_id'
	];
}
