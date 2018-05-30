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

		//$questions = DB::select(DB::raw("select * from question where textsearchable_index_col @@ plainto_tsquery('english','$search')"));
		$questions=Question::selectRaw("*")
						->whereRaw("textsearchable_index_col @@ plainto_tsquery('english',?)", [$search])
						->get();
						//dd($questions);
		//dd($questions);
		//$answers = DB::select(DB::raw("select * from answer where textsearchanswer_index_col @@ plainto_tsquery('english','$search')"));
		$answers=Answer::selectRaw('*')
						->whereRaw("textsearchanswer_index_col @@ plainto_tsquery('english',?)", [$search])
						->get();
		$search_result= array();
		foreach($answers as $answer){
			$questions2=Question::find($answer->id_question);
			array_push($search_result,$questions2);
		}

		foreach($questions as $question){
			array_push($search_result,$question);
		}

		$topics = Topic::all();
		$users = User::all();
		
		//dd($search_result);
		return view('pages.search', compact(
			'topics',
			'search_result','users','questions'
		));
	}

	public function help(){
		$topics = Topic::all();
		return view('pages.help', compact(
			'topics'
		));
	}

}