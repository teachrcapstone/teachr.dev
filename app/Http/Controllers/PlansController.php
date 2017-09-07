<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PlansController;
use App\Models\Plan as Plan;
// use App\
use Auth;

class PlansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function _construct(){
         $this->middleware('auth');
    }

    public function index()
    {
        //
        $plans = Plan::all();
        $data['plans'] = $plans;

        return view('plans.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('plans.create');
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
        // dd($request);
        $plan = new Plan();
        $plan->name = $request->name;
        $plan->tek = $request->tek;
        $plan->objective = $request->objective;
        $plan->department = $request->department;
        $plan->grade_level = $request->grade_level;
        $plan->content = $request->content;
        $plan->file_uploads = $request->file_uploads;
        $plan->created_by = Auth::id();
        $plan->save();

        return \Redirect::action('UsersController@show', Auth::id());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $plan = Plan::findOrFail($id);
        $data['plan'] = $plan;
        return view('plans.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $plan = Plan::findOrFail($id);

        $data['plan'] = $plan;

        return view('plans.edit', $data);
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
        //
        $plan = Plan::findOrFail($id);
        $plan->name = $request->name;
        $plan->tek = $request->tek;
        $plan->objective = $request->objective;
        $plan->department = $request->department;
        $plan->grade_level = $request->grade_level;
        $plan->content = $request->content;
        $plan->file_uploads = $request->file_uploads;
        $plan->save();

        return \Redirect::action('UsersController@show', Auth::id());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
