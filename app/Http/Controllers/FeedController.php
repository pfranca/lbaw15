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
        $Mquestions= array();
        $topics = \Auth::user()->followTopic;
        foreach($topics as $topic){
                $question = Question::all()->where('id_topic',$topic->id);
            array_push($Mquestions, $question);
        }
        $allTopics = Topic::all();
        $allQuestions = Question::all();
       // dd($Mquestions);
         return view('pages.feed', compact(['topics','Mquestions','allQuestions','allTopics']));
        /*return response()->json([
                "status" => "success",
                "data" => $Mquestions,
                "topics" => $allTopics,
                "message" => "created question"]);*/
        }

        public function getQuestions()
        {
            $questions= array();
            $topics = \Auth::user()->followTopic;
            foreach($topics as $topic){
                 $question = Question::all()->where('id_topic',$topic->id);
                array_push($questions, $question);
            }
            return response()->json([
                "status" => "success",
                "data" => $questions,
                "message" => "created question"]);
        }
   
}
?>