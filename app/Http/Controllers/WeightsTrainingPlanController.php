<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Paginate;
use App\Http\Requests;
use App\weight_exercises;
use App\Weight_Training_Plans;
use Session;
use Redirect;
use Auth;
use Bugsnag;

class WeightsTrainingPlanController extends Controller
{

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
      //Get dates & pagination
      Carbon::setToStringFormat('d/m/Y');
      $now = Carbon::now();
      $m = $now->startOfWeek()->subWeek();

      $sunday = $now->endOfWeek();
      for ($i = 1 ; $i <= 56; $i++) {
          $dates[] = $now->copy()->addDays($i);
      }

      $currentPage = LengthAwarePaginator::resolveCurrentPage();
      $col = new Collection($dates);
      $perPage = 7;

      $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();

      $entries = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);

      //Get Excercies
      $ex = weight_exercises::all();

      return view('trainingplans.weight_training.index', ['entries' => $entries,])->with('ex',$ex);

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

      //validate
      $this->validate($request, array (
          //'user_id' => 'required|integer|unique:workout_goals,user_id,NULL,id,exercise,'.$request->exercise,
          'reps' => 'required|integer',
          'exercise' => 'required|unique:weight__training__plans,exercise_id,NULL,id,created_at,'.$request->date,


      ));

     $response = weight_training_plans::where('exercise_id', $request->exercise)->where('date', $request->date)->where('user_id', Auth::User()->id)->get();
     if(count($response)>0){

       $exercise_id = $request->exercise;

       $exercise = weight_exercises::find($exercise_id)->exercise;

      //session flash message
      Session::flash('workout_error','You have already created a '.$exercise.' workout for '.$request->date);

      //redirect
      $currentPage = LengthAwarePaginator::resolveCurrentPage();
      return Redirect::to('weights-training-plan?page='.$currentPage);
     }
     elseif(count($response)==0)
     {
      //store
      $post = new weight_training_plans;

      $post->user_id = $request->user_id;
      $post->date = $request->date;
      $post->exercise_id = $request->exercise;
      $post->weight = $request->weight;
      $post->reps = $request->reps;
      $post->sets = $request->sets;

      //save
      $post->save();

      //session flash message
      Session::flash('success','Session created, go smash it!');

      //redirect
      $currentPage = LengthAwarePaginator::resolveCurrentPage();
      return Redirect::to('weights-training-plan?page='.$currentPage);
     }
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
