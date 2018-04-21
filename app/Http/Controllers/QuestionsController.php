<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Topic;
use App\Answer;
use DB;
use App\User;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($topic_name)
    {
        $topic = Topic::where('name', $topic_name)->get();
        $topics = Topic::All();
        $questions = Question::where('id_topic', $topic[0]->id)->paginate(5);
        $answers = Answer::All();
       // dd($answers);
        // $topics = Topic::orderBy('name','desc')->paginate(4);
        //$questions = Question::orderBy('karma','desc'); 
        $data=array(
            'topic_name' => $topic_name,
            'questions' => $questions,
            'answers' => $answers,
            'topics' => $topics
        );
       return view('pages.topic')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $long_message = $request->input('long_message');
        $data = $request->all();
      //  if (empty($long_message)){
           /* Question::create([
                'id_author' => $data['id_author'],
                'id_topic' => $data['id_topic'],
                'short_message' => $data['short_message'],
                ]);
         }else{*/
            $id_user = \Auth::user()->id;
            Question::create([
                'id_author' =>$id_user,
                'id_topic' => $data['id_topic'],
                'short_message' => $data['short_message'],
                'long_message' => $data['long_message']
                ]);
      //  }
       
        return response()->json([
            "status" => "success",
            "data" => $data,
            "message" => "created question"]);
    }

    public function disable(Request $request){
        $data = $request->all();

        DB::table('question')
            ->where('id',$data['id_question'])
            ->update([
                'disabled' => true
            ]);
     
        return response()->json([
            "status" => "success",
            "data" => $data,
            "message" => "Question Deleted"]);

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      // return Question::find($id);
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

    public function getBestAnswer(Request $request){
        $data = $request->all();
        $question = Question::find();
        $answers = $question->answers;
        $question_id =$data['id_question'];
        $best = DB::raw("SELECT date, karma, message, username FROM answer, \"user\" WHERE id_question = \"$question_id\" AND answer.disabled=FALSE AND id_author = \"user\".id AND karma = (SELECT max(karma) FROM answer WHERE id_question = \"$question_id\");");
        return response()->json([
            "status" => "success",
            "data" => $best,
            "message" => "get BestAnswer"]);
    }
}
