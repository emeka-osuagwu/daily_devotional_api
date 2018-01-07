<?php

namespace App\Models;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $table = 'notes';

	protected $fillable = [
		'title',
		'note',
		'user_id',
	];

	public function getCreatedAtAttribute($value)
	{
	    return Carbon::parse($value)->diffForHumans();
	}
}
