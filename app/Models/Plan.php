<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFollow\Traits\CanBeLiked;
use Overtrue\LaravelFollow\Traits\CanBeFavorited;

class Plan extends Model
{
	use CanBeLiked;
    //
	protected $table = 'plans';

	public function user()
	{
	    return $this->belongsTo('App\User', 'created_by');
	}

}
