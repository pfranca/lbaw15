<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Topic;
use DB;

class PagesController extends Controller
{
    public function home(){
		return view('pages.home');
	}

	public function profile($username){
		$temp = \DB::table('user')->where('username',$username)->get();
		$user = User::find($temp[0]->id);
		$questions = $user->questions;
		$topics = Topic::all();
		return view('pages.profile', array('questions'=> $questions,'topics'=> $topics,'user' => $user));
	}

	public function topic($topic_name){
		return view('pages.topic')->with('topic_name', $topic_name);
	}

	public function question(){
		return view('pages.question');
	}

/*	public function search(Request $request){
		$search = $request['search'];
		$best = DB::raw("SELECT question.id, date, karma, short_message FROM question WHERE id IN  (SELECT id_question FROM answer where message like %$search% UNION SELECT id FROM question WHERE textsearchable_index_col @@ to_tsquery('$search'));");
		return response()->json([
            "status" => "success",
            "data" => $best,
            "message" => "get BestAnswer"]);
	}*/
	
	public function searchIndex($search){
		$best = DB::raw("SELECT question.id, date, karma, short_message 
		FROM question WHERE id IN  
		(SELECT id_question FROM answer
		 where message like %$search% UNION
		  SELECT id
		  FROM question WHERE textsearchable_index_col @@ to_tsquery('$search'));");		
		return response()->json([
            "status" => "success",
            "data" => $best,
            "message" => "get BestAnswer"]);
	}
}
