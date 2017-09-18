<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PlansController;

use App\User as User;
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


            foreach($search as $key => $value){
                if ($key == "search" && !empty($value)){
                    $plans->where(function($query) use ($value){
                        $query->where('content', 'like', '%'. $value . '%')
                              ->orWhere('name', 'like', '%' . $value . "%")
                              ->orWhere('objective', 'like', '%' . $value . '%');
                    });
                } elseif ($key != 'search' && !empty($value)){
                    $plans->where($key, 'like', $value);
                } else {
                    continue;
                }
            }

            $result = $plans->get();

            $plans = Plan::hydrate($result);

        } else {
            $plans = Plan::all();
        }
        // foreach($plans as $plan){
        //     $parser = new \HtmlDomParser;
        //     $html = $parser->strGetHtml("<html><body>" . $plan->content . "</body></html>");
        //
        //     $content = $html->find('body', 0);
        //
        //     if (count($content->find('p')) > 0) {
        //         $paragraphs = $content->find('p');
        //         $p = 0;
        //         while (preg_match('/[A-Za-z]+/', $content->find('p', $p)->plaintext) == 0) {
        //             $p += 1;
        //         }
        //         $plan->content = $content->find('p', $p)->innertext;
        //
        //         // for ($i = 0, $j = 0; $i < count($paragraphs) || $j < 1; $i++, $j++){
        //         //     if (preg_match('/[A-Za-z]+/', $content->find('p', $i)->plaintext) == 0) {
        //         //         continue;
        //         //     } else {
        //         //         $plan->content .= $content->find('p', $i)->innertext;
        //         //     }
        //         // }
        //     } else {
        //            $plan->content = $content->innertext;
        //     };
        // }
        $data['plans'] = $plans;
        // var_dump($plans);

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

        return \Redirect::action('PlansController@show', $plan->id);
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
        // dd($plan->created_by->);
        $user = User::findOrFail($plan->created_by);
        // dd($plan->copied_from);

        if (isset($plan->copied_from)) {

            $original = $user->favorites(Plan::class)->where('id', '=', $plan->copied_from)->get()->pull(0);
            // dd($original->name);
            $data['original'] = $original;
        }



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

        return \Redirect::action('PlansController@show', $plan->id);
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

        $user = Auth::user();

        if ($plan->copied_from){
            $user->unfavorite($plan);
        }

        $plan->delete();

        // Log::info('Plan ' . $plan->id . ' was deleted');

        $request->session()->flash("successMessage" , "Your plan was successfully deleted");


        return \Redirect::action('UsersController@show', Auth::id());
    }

    //social methods
    public function like($id)
    {
        $liked = Plan::findOrFail($id);
        $user = User::findOrFail(Auth::id());

        $user->like($liked);
        session()->flash('successMessage', 'Plan Liked.');
        return \Redirect::action('PlansController@show', $liked->id);
    }

    public function unlike($id)
    {
        $unliked = Plan::findOrFail($id);
        $user = User::findOrFail(Auth::id());

        $user->unlike($unliked);
        session()->flash('successMessage', 'Plan Unliked.');
        return \Redirect::action("PlansController@show", $unliked->id);
    }

    public function copy($id)
    {
        $copied = Plan::findOrFail($id);

        $user = User::findOrFail(Auth::id());

        if (!$user->hasFavorited($copied)){
            $user->favorite($copied);

            $plan = new Plan();
            $plan->name = $copied->name;
            $plan->tek = $copied->tek;
            $plan->objective = $copied->objective;
            $plan->department = $copied->department;
            $plan->grade_level = $copied->grade_level;
            $plan->content = $copied->content;
            $plan->file_uploads = $copied->file_uploads;
            $plan->created_by = Auth::id();
            $plan->copied_from = $copied->id;
            $plan->save();
        }


        return \Redirect::action('PlansController@show', $plan->id);

    }

    // public function unfavorite($id)
    // {
    //
    // }
}
