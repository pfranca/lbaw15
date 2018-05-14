<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\FollowTopic;
use App\User;
use App\Question;
use App\Report;

class ReportController extends Controller
{



    public function reportQuestion(Request $request)
    {
        $data = $request->all(); // This will get all the request data.
        $questionID = $data['id_question'];
        $reason = $data['reason'];
        $question = Question::find($questionID);
        $reporterUser = $question->user;
        Report::create([
            'reason' => $reason,
            'id_reporting_user' => $reporterUser->id,
            'id_reported_question' => $questionID
        ]);
        return response()->json([
            "status" => "success",
            "data" => $data,
            "questionID" => $questionID, 
            "reason" => $reason,
            "question" => $question,
            "reporterUser" => $reporterUser,
            "message" => "Answer Deleted"]);
    }


    public function reportAnswer(Request $request)
    {
        $data = $request->all(); // This will get all the request data.
        $answerID = $data['id_answer'];
        $reason = $data['reason'];
        $answer = Question::find($answerID);
        $reporterUser = $answer->user;
        Report::create([
            'reason' => $reason,
            'id_reporting_user' => $reporterUser->id,
            'id_reported_answer' => $answerID
        ]);
        return response()->json([
            "status" => "success",
            "data" => $data,
            "questionID" => $answerID, 
            "reason" => $reason,
            "question" => $answer,
            "reporterUser" => $reporterUser,
            "message" => "Answer Deleted"]);
    }
    

}