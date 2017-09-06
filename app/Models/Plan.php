<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    //
	protected $table = 'plans';

	public function user()
	{
	    return $this->belongsTo('App\User', 'created_by');
	}

}
