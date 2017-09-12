<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PlansController;
use App\Models\Plan as Plan;
// use App\
use Auth;
use DB;
use HtmlDomParser;


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

    public function index(Request $request)
    {
        //
        if (!empty($request->all())) {
            // echo count($request);
            // dd($request->all());
            $search = $request->all();
            $plans = DB::table('plans');

            // dd($plans);

            foreach($search as $key => $value){
                if ($key == "search"){
                    $plans->where('content', 'like', '%'. $value . '%')
                          ->orWhere('name', 'like', '%' . $value . "%")
                          ->orWhere('objective', 'like', '%' . $value . '%');
                } else {
                    $plans->where($key, 'like', $value);
                }
            }

            // dd($plans);
            $plans = $plans->get();
            $data['plans'] = $plans;

        } else {
            $plans = Plan::all();
            $data['plans'] = $plans;
        }


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

        if (!empty($request->file_uploads)){
            //$plan->content = $request->content;
            $parser = new \HtmlDomParser();
            // get html dom from file
            $html = $parser->fileGetHtml('https://process.filestackapi.com/A4e3fBA8JTkOq2h4hG7NDz/output=f:html/' . $request->file_uploads);
            // $html = HtmlDomParser::fileGetHtml('https://process.filestackapi.com/A4e3fBA8JTkOq2h4hG7NDz/output=f:html/' . $request->file_uploads);
            $plan->content = $html->find('body', 0)->innertext;
            //echo $e->innertext;
            //dd($html);
            //$plan->content = ;
        } else {
            $plan->content = $request->content;
        }

        $plan->file_uploads = $request->file_uploads;

        $plan->created_by = Auth::id();
        $plan->save();


        $request->session()->flash("successMessage" , "Your plan was successfully created");

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


        $request->session()->flash("successMessage" , "Your plan was successfully updated");

        return \Redirect::action('UsersController@show', Auth::id());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        $plan = Plan::findOrFail($id);

        $plan->delete();

        // Log::info('Plan ' . $plan->id . ' was deleted');

        $request->session()->flash("successMessage" , "Your plan was successfully deleted");

        return \Redirect::action('UsersController@show', Auth::id());
    }
}
