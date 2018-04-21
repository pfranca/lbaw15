<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Topic;

class PagesController extends Controller
{
    public function home(){
		return view('pages.home');
	}

	public function profile(){
		$id_user = \Auth::user()->id;
		$questions = User::find($id_user)->questions;
		$topics = Topic::all();
		return view('pages.profile', array('questions'=> $questions,'topics'=> $topics));
	}

	public function topic($topic_name){
		return view('pages.topic')->with('topic_name', $topic_name);
	}

	public function question(){
		return view('pages.question');
	}
}
