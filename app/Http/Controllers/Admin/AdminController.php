<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Auth;
use App\User;
use App\Topic;


class AdminController extends Controller
{

    public function getTopics(){
        $topics = \DB::table('topic')->get();
        return response()->json(['response' => $topics]);
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
        $moderator = \DB::table('moderator')->get();
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
}
?>