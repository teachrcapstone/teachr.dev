<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \App\User as User;
use \App\Models\Post;
use \App\Models\Plan;

use Log;
use Auth;

class UsersController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$users = User::all();

		$data['users'] = $users;
		return view('users.index' , $data);

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{

		$user = User::findOrFail($id);

		// $userPlans = $user->plans;
		$userPlans = Plan::where('created_by', $user->id)->orderBy('created_at','DESC')->limit(3)->get();

		$userPosts = Post::where('created_by', $user->id)->orderBy('created_at','DESC')->limit(3)->get();
		$followers = $user->followers;
		$followings = $user->followings()->orderBy('created_at', 'DESC')->get();

		$data['user'] = $user;
		$data['userPosts'] = $userPosts;
		$data['userPlans'] = $userPlans;
		$data['followers'] = $followers;
		$data['followings'] = $followings;

		Log::info('User account ' . $user->id . ' was viewed');

		return view('users.show', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{

		$user = User::findOrFail($id);
 		if (Auth::id() == $user->id) {
			$data['user'] = $user;

			return view('users.edit', $data);
		} else {
			return view('errors.403');
		};
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
		$result = $this->validate($request, User::$rules);

		$user = User::findOrFail($id);


		$user->name = $request->name;
		$user->email = $request->email;
		$user->image = $request->image;
		$user->bio = $request->bio;
		$user->save();

		Log::info('User ' . $user->id . ' was edited');

		$request->session()->flash("successMessage" , "Your account was updataed successfully");


		return \Redirect::action('UsersController@dashboard');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Request $request, $id)
	{
		$user = User::findOrFail($id);


		$user->delete();

		Log::info('User ' . $user->id . ' was deleted');

		$request->session()->flash("successMessage" , "Your account was successfully deleted");

		return \Redirect::action('/');
	}

	public function myPosts()
	{
	 	$user = User::findOrFail(Auth::id());

		$userPosts = Post::where('created_by', $user->id)->orderBy('created_at','DESC')->paginate(10);

		$data['userPosts'] = $userPosts;


	 return view('posts.userposts', $data);
	}

	public function myPlans()
	{
		$user = User::findOrFail(Auth::id());

		$userPlans = Plan::where('created_by', $user->id)->orderBy('created_at','DESC')->paginate(10);

		$data['userPlans'] = $userPlans;
	 
	 	return view('plans.userplans', $data);


	}

	public function savedPlans()
	{
	 	$user = User::findOrFail(Auth::id());

	 	$likedIds = $user->likes(Plan::class)->lists('followable_id')->toArray();

	 	$likedPlans = Plan::whereIn('id', $likedIds)->orderBy('created_at','DESC')->paginate(10);


		$data['likedPlans'] = $likedPlans;


	 return view('users.savedplans', $data);
	}




    public function dashboard()
    {
    	$user = User::findOrFail(Auth::id());

		$userPlans = Plan::where('created_by', $user->id)->orderBy('created_at','DESC')->limit(3)->get();

		$userPosts = Post::where('created_by', $user->id)->orderBy('created_at','DESC')->limit(3)->get();

		$followers = $user->followers;
		$followings = $user->followings()->get();


		$userIds = $user->followings()->lists('followable_id')->toArray();
		// $userIds[] = $user->id;

		$followingsPosts = Post::whereIn('created_by', $userIds)->orderBy('created_at','DESC')->limit(7)->get();

		$likedIds = $user->likes(Plan::class)->lists('followable_id')->toArray();

		$likedPlans = Plan::whereIn('id', $likedIds)->orderBy('created_at','DESC')->limit(3)->get();


		$data['user'] = $user;
		$data['userPosts'] = $userPosts;
		$data['userPlans'] = $userPlans;
		$data['followers']=$followers;
		$data['followings']= $followings;
		$data['followingsPosts'] = $followingsPosts;
		$data['likedPlans'] = $likedPlans;


    	return view('users.dashboard', $data);
    }

	public function mySettings()
	{
		$user = User::findOrFail(Auth::id());
		$data['user'] = $user;
		return view('users.settings', $data);
	}

	//social methods
	public function follow($id)
    {
    	$followedUser = User::findOrFail($id);

    	$currentUser = User::findOrFail(Auth::id());
        $currentUser->follow($followedUser);


    	session()->flash('successMessage', 'You have successfully followed this user!');

        return \Redirect::action('UsersController@show', $followedUser->id);

    }



	public function unfollow($id)
    {
    	$followedUser = User::findOrFail($id);

    	$currentUser = User::findOrFail(Auth::id());
        $currentUser->unfollow($followedUser);


    	session()->flash('successMessage', 'You have successfully unfollowed this user!');

        return \Redirect::action('UsersController@show', $followedUser->id);

    }








}
