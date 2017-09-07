<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \App\Models\Post; 
use Log;
use Auth;
use DB;


class PostsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function __construct(){
		$this->middleware('auth');
	}

	public function index(Request $request)
	{

		if($request->has('category')){

			if($request->category == 'all'){

				$posts = Post::with('user')
				->orderBy('created_at','DESC')
				->paginate(10);

			} else {

				$q = $request->category;

				$posts = Post::search($q);
				
			}

			$data['category'] = $request->category;

			$data['posts'] = $posts;
	   
			return view('posts.index', $data);
		} 


		return view('categories.index');
	}


	// public function index(Request $request)
	// {
	//     if($request->has('q')){
	//         $q = $request->q;
	//         $posts = Post::search($q);

	//     } else{

	//         $posts = Post::with('user')
	//         ->orderBy('created_at','DESC')
	//         ->paginate(4);
	//     }
  
	//     Log::info('A user just visited the index page');
		
	//     $data['posts'] = $posts;
	   
	//     return view('posts.index', $data);

	// }





	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('posts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$userId = Auth::id();

		$result = $this->validate($request, Post::$rules);

		$post = new Post();
		$post->title = $request->title;
		$post->content = $request->content;
		$post->category = $request->category;
		$post->created_by = $userId;
		$post->save();

		Log::info($post);


		$request->session()->flash("successMessage" , "Your post was posted successfully");

		return \Redirect::action('PostsController@index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$post = Post::findOrFail($id);
		
		$data['post'] = $post;   

		Log::info('Post ' . $post->id . ' was viewed');

		return view('posts.show', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$post = Post::findOrFail($id);    

		$data['post'] = $post;

		return view('posts.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$result = $this->validate($request, Post::$rules);

		$post = Post::findOrFail($id);

		$post->title = $request->title;
		$post->content = $request->content;
		$post->category = $request->category;
		$post->created_by = Auth::id();

		$post->save();

		Log::info('Post ' . $post->id . ' was edited');

		$request->session()->flash("successMessage" , "Your post was updataed successfully");


		return \Redirect::action('PostsController@index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Request $request, $id)
	{
		$post = Post::findOrFail($id);

		$post->delete();

		Log::info('Post ' . $post->id . ' was deleted');

		$request->session()->flash("successMessage" , "Your post was successfully deleted");

		return \Redirect::action('PostsController@index');
	}
}
