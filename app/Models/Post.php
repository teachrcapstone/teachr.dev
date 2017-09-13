<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;


class Post extends BaseModel
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

			->where('category', 'like', "%$search%")
			->orderBy('created_at','DESC')
			->paginate(10);	

        return $posts; 
	}




}
