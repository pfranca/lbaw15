<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class PagesController extends Controller
{
    public function home(){
		return view('pages.home');
	}

	public function profile(){
		$questions = User::find(11)->questions;
		return view('pages.profile')->with('questions', $questions);
	}

	public function topic($topic_name){
		return view('pages.topic')->with('topic_name', $topic_name);
	}

	public function question(){
		return view('pages.question');
	}
}
