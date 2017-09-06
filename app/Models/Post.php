<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $table = 'posts';

	public static $rules = [

		'title' => 'required|min:2|max:200',
		'content' => 'required',
		'category' => 'required'

	];

	public function user()
	{
		return $this->belongsTo('\App\User', 'created_by');
	}


}
