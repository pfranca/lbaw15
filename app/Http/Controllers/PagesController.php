<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Topic;
use DB;
use App\Answer;
use App\Question;
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
	
	public function search(Request $request){
		$search = $request['search'];
		$questions = DB::select(DB::raw("select * from question where textsearchable_index_col @@ plainto_tsquery('english','$search')"));
		$answers = DB::select(DB::raw("select * from answer where textsearchanswer_index_col @@ plainto_tsquery('english','$search')"));
		$search_result= array();
		foreach($answers as $answer){
			$question=Question::find($answer->id_question);
			array_push($search_result, $question);
		}
		foreach($questions as $question){
			array_push($search_result, $question);
		}

		$Mquestions = array();
		array_push($Mquestions,$search_result);

			//dd($Mquestions);
		return view('pages.search')->with('Mquestions', $Mquestions);
	}
	
	public function searchIndex($search){
		$best = DB::raw("SELECT * FROM question WHERE id IN  (SELECT id_question FROM answer where textsearchanswer_index_col @@ \"$search\" UNION SELECT id FROM question WHERE textsearchable_index_col @@ to_tsquery(\"$search\"));");		
		return response()->json([
            "status" => "success",
            "data" => $best,
            "message" => "get seacrh"]);
	}
}