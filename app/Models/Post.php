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

	public static function search($search)
	{

		$posts = Post::with('user')
			->where('title','like', "%$search%")
			->orWhere('content', 'like', "%$search%")
			->orWhere('category', 'like', "%$search%")


			->orWhereHas('user' , function($query) use ($search) {
				$query->where('name', 'like', "%$search%");
			})
			->orderBy('created_at','DESC')
			->paginate(4);	

        return $posts; 
	}


}
