<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Auth;
use App\User;
use App\Topic;
use Illuminate\Http\Request;


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
            "data" => $topics,
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
        $users = \DB::table('user')->get();
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
        if($topic->disabled)
            $topic->disabled = 'false';
        else
            $topic->disabled = 'true';
        $topic->save();
        return response()->json([
            "status" => "success",
            "data" => $topic,
            "message" => "created topic"]);
    }

}
?>