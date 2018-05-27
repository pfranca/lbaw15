<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Topic;
use DB;
use App\Answer;
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
	
/*
	public function search(Request $request){
		$search = $request['search'];
		$answers = Answer::all();
		$bla = $answers->raw("where textsearchanswer_index_col @@ \"$search\"");
		$best = DB::raw("SELECT * FROM answer where textsearchanswer_index_col @@ \"$search\"");
		$answer = Answer::all()->where('message',$search);
		return response()->json([
            "status" => "success",
			"data" => $best,
			"search" =>$search,
			"answer" => $answer,
			"bla" => $bla,
            "message" => "get BestAnswer"]);
	}*/
	
	public function search($search){
		$queries = Answer::query();
		$answer = $queries->whereRaw("message @@ to_tsquery('check)");
		$query = Db::raw("select * from answer where message @@ to_tsquery('check')");
		//$best = DB::raw("SELECT * FROM question WHERE id IN  (SELECT id_question FROM answer where textsearchanswer_index_col @@ \"$search\" UNION SELECT id FROM question WHERE textsearchable_index_col @@ to_tsquery(\"$search\"));");		
		return response()->json([
            "status" => "success",
			"data" => $query,
			"queries" => Db::raw("Select * from answer"),
			"search" => $answer,
		//	"answer" => Answer::all(),
            "message" => "get seacrh"]);
	}
}