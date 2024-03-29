<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Auth;
use App\User;
use App\Topic;
use App\Question;
use App\Answer;
use Illuminate\Http\Request;
use App\Report;

class AdminController extends Controller
{

    public function getModeratorPage(){
        //ir buscar users
        $users = \DB::table('user')->get();
        $data=array(
            'users' => $users
        );
        return view('pages.adminModerator')->with($data);
    }

    public function getTopics(){
        $topics = \DB::table('topic')->get();
        return response()->json([
            "status" => "success",
            "response" => $topics,
            "message" => "created topic"]);
    }

    public function getQuestions(){
        $questions = \DB::table('question')->get();
        return response()->json(['response' => $questions]);
    }

    public function getAnswers(){
        $answer = \DB::table('answer')->get();
        return response()->json(['response' => $answer]);
    }

    public function getModerators(){
        $moderator = \DB::table('user')->where('type','MOD')->get();
        return response()->json(['response' => $moderator]);
    }

    public function getUsers(){
        $users = User::all();
        return response()->json(['response' => $users]);
    }

    public function getReports(){
        $reports = \DB::table('report')->get();
        return response()->json(['response' => $reports]);
    }

    public function addTopic(Request $request){
        $data = $request->all(); // This will get all the request data.
        $name = $request->input('name');
        $img = $request->input('img');
        Topic::create([
            'name' => $data['name'],
            'img' => $data['img']
            ]);
        return response()->json([
            "status" => "success",
            "data" => $data,
            "message" => "created topic"]);
    }

    public function addModerator(Request $request){
        $user = User::find($request->input('id'));

        $user->type = 'MOD';

        $user->save();
        return response()->json([
            "status" => "success",
            "data" => $user,
            "message" => "created topic"]);
    }

     public function removeModerator(Request $request){
        $user = User::find($request->input('id'));

        $user->type = 'NORMAL';

        $user->save();

        return response()->json([
            "status" => "success",
            "data" => $user,
            "message" => "Moderator Deleted"]);

    }

    public function disableTopic(Request $request){
        $topic = Topic::find($request->input('id'));
        if($topic->disabled == true)
            $topic->disabled = false;
        else if($topic->disabled == false)
            $topic->disabled = true;
        $topic->save();
        return response()->json([
            "status" => "success",
            "data" => $topic,
            "message" => "created topic"]);
    }

    public function disableQuestion(Request $request){

        $question = Question::find($request->input('id'));
        $answers = $question->answers;
        if($question->disabled == true){
            $question->disabled = false;
            foreach($answers as $answer){
                $answer->disabled = false;
            }
        }

        else if($question->disabled == false){
            $question->disabled = true;
            foreach($answers as $answer){
                $answer->disabled = true;
            }
        }

        $question->save();

        return response()->json([
            "status" => "success",
            "data" => $question,
            "answers" => $answers,
            "message" => "created topic"]);
    }

    public function disableAnswer(Request $request){

        $answer = Answer::find($request->input('id'));

        if($answer->disabled == true)
            $answer->disabled = false;

        else if($answer->disabled == false)
            $answer->disabled = true;

        $answer->save();

        return response()->json([
            "status" => "success",
            "data" => $answer,
            "message" => "created topic"]);
    }

    public function deleteReport(Request $request){
        $report = Report::find($request->input('id'));
        $report->delete();

        return response()->json([
            "status" => "success",
            "message" => "report removed"]);
    }


    public function disableUser(Request $request){

        $user = User::find($request->input('id'));

        if($user->disabled == true)
            $user->disabled = false;

        else if($user->disabled == false)
            $user->disabled = true;

        $user->save();

        return response()->json([
            "status" => "success",
            "data" => $user,
            "message" => "created topic"]);
    }

    public function removeAnswerQuestion(Request $request){
        $report = Report::find($request->input('id')); 
        $answer_id = $report->id_reported_answer;
        $question_id = $report->id_reported_question;
        if($answer_id != null){
            $answer = Answer::find($answer_id);
            $answer->disabled = true;
            $answer->save();
        }else if($question_id != null){
            $question = Question::find($question_id);
            $question->disabled = true;
            $question->save();
        }
        $report->delete();
        return response()->json([
            "status" => "success",
            "question_id" => $question_id,
            "answer_id" => $answer_id,
            "message" => "deleted answer/question and report"]);
    }

}
?>