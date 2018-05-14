<?php

namespace App\Http\Controllers;

use App\Topic;
use App\FollowQuestion;
use App\User;
use App\Question;
use Illuminate\Http\Request;

class FeedController extends Controller
{
   /**
     * .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = \Auth::user()->followTopic;
        $data;
        $questions = array();
        foreach($topics as $topic){
            $question = \DB::table('question')->where('id_topic',$topic->id)->get();
            array_push($questions, $question);
        }
         return view('pages.feed', compact(['topics',$topics,'questions',$questions]));
        }

   
}
?>