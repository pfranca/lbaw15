<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Topic;
use App\Answer;
use DB;
use App\User;
use App\Notification;


class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /* $response=array();
        $questions =Question::all();
        $notifications =;
        foreach($notifications as $notification){
            $question = null;
            foreach($questions as $question){
                if($question->id == $notification->id_question)
                    $question = Question::find($question->id);
            }
            $temp=array(
                'message' => $notification->message,
                'question' => $question
            );
            array_push($response,$temp);
        }*/
       
        $data=array(
            'notifications' => \Auth::user()->notifications,
            //'notifications' => Notification::all(),
            'topics' => Topic::all(),
            'questions' => Question::all()
        );
       return view('pages.notification')->with($data);
    }

    public function dismiss(Request $request){
        $data = $request->all();
        $id_notification = $data['id_notification'];

        DB::table('notification')
        ->where([['id', $id_notification]])
        ->update([
                'seen' => 'TRUE'
        ]);

        return response()->json([
            "status" => "success",
            "data" => $data,
            "notifications" => $id_notification,
            "message" => "dismissed"]);
    }

  
}


?>