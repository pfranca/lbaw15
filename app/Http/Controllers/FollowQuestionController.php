<?php

namespace App\Http\Controllers;

use App\Topic;
use App\FollowQuestion;
use App\User;
use App\Question;
use Illuminate\Http\Request;

class FollowQuestionController extends Controller
{
   /**
     * .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /* $Mquestions= array();
        $topics = \Auth::user()->followTopic;
        foreach($topics as $topic){
                $question = Question::all()->where('id_topic',$topic->id);
            array_push($Mquestions, $question);
        }*/
        $data=array(
            //'notifications' => \Auth::user()->notifications,
            //'notifications' => Notification::all(),
            'topics' => Topic::all(),
            'questions' => \Auth::user()->followQuestion
        );
         return view('pages.followQuestion')->with($data);
        }
   
}
?>