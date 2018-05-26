<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Topic;
use App\FollowQuestion;
use App\Answer;
use App\User;
use App\Vote;
use DB;

class AnswersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($topic_name, $id)
    {
        
        $question = Question::find($id);
        $answers = Answer::where('id_question', $id)->get();
        $data=array(
            'topic_name' => $topic_name,
            'question' => $question,
            'answers' => $answers
        );
        return view('pages.question')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function disable(Request $request){
        $data = $request->all();

        DB::table('answer')
            ->where('id',$data['id_answer'])
            ->update([
                'disabled' => true
            ]);
    
        return response()->json([
            "status" => "success",
            "data" => $data,
            "message" => "Answer Deleted"]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function addAnswer(Request $request){
        $data = $request->all();
        $id_user = \Auth::user()->id;
        $questionId = $data['id_question'];
        Answer::create([
            'id_author' => $id_user,
            'id_question' => $data['id_question'],
            'message' => $data['message']
            ]);
        return response()->json([
            "status" => "success",
            "data" => $data,
            "user_id" => $id_user,
            "message" => "get BestAnswer"]);
    }

    public function updateAnswer(Request $request){
        $data = $request->all();
        DB::table('answer')
            ->where('id', $data['id_answer'])
            ->update([
                    'message' => $data['message']
              ]);

        return response()->json([
            "status" => "success",
            "data" => $data,
            "message" => "update ANswer"]);
    }

    public function upvote(Request $request){
        $data = $request->all();
        $id_answer = $request->input('id_answer');

        $id_user = \Auth::user()->id;

        $oldVote = DB::table('vote')
        ->where([['id_user', $id_user], ['id_answer', $data['id_answer']]])
        ->first();

        $oldVote_vote = DB::table('vote')
        ->where([['id_user', $id_user], ['id_answer', $data['id_answer']], ['vote', 'true']])
        ->first();

        if($oldVote != NULL){
            if($oldVote_vote == NULL){
                DB::table('vote')
                ->where([['id_user', $id_user], ['id_answer', $data['id_answer']]])
                ->update([
                        'vote' => 'TRUE'
                ]);
            }else{
                return response()->json([
                    "status" => "failed",
                    "data" => $data,
                    "user" => $id_user,
                    "message" => "upvote"]);
            }
        }else{
            Vote::create([
                'id_user' => $id_user,
                'id_answer' => $id_answer,
                'vote' => 'TRUE'
                ]);
        }

        return response()->json([
            "status" => "success",
            "data" => $data,
            "user" => $id_user,
            "message" => "upvote"]);
    }

    public function downvote(Request $request){
        $data = $request->all();
        $id_answer = $request->input('id_answer');

        $id_user = \Auth::user()->id;

        
        $oldVote = DB::table('vote')
        ->where([['id_user', $id_user], ['id_answer', $data['id_answer']]])
        ->first();

        $oldVote_vote = DB::table('vote')
        ->where([['id_user', $id_user], ['id_answer', $data['id_answer']], ['vote', 'false']])
        ->first();

        if($oldVote != NULL){
            if($oldVote_vote == NULL){
                DB::table('vote')
                ->where([['id_user', $id_user], ['id_answer', $data['id_answer']]])
                ->update([
                        'vote' => 'FALSE'
                ]);     
            }else{
                return response()->json([
                    "status" => "failed",
                    "data" => $data,
                    "user" => $id_user,
                    "message" => "downvote"]);
            }
        }else{
            Vote::create([
                'id_user' => $id_user,
                'id_answer' => $id_answer,
                'vote' => 'FALSE'
                ]);
        }

        return response()->json([
            "status" => "success",
            "data" => $data,
            "user" => $id_user,
            "message" => "upvote"]);
    }





}
?>