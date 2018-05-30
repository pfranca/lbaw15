<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Topic;
use App\Answer;
use App\FollowQuestion;
use DB;
use App\User;
use App\Vote;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexOrdered($topic_name,$order)
    {
        $topic = Topic::where('name', $topic_name)->get();
        $topics = Topic::All();
        if($order !== "karma")
            $questions = Question::where('id_topic', $topic[0]->id)->orderBy('date',$order)->paginate(5);
        else
            $questions = Question::where('id_topic', $topic[0]->id)->orderBy('karma',$order)->paginate(5);
        $answers = Answer::All();
       // dd($answers);
        // $topics = Topic::orderBy('name','desc')->paginate(4);
        //$questions = Question::orderBy('karma','desc'); 
        if( \Auth::user() != null){
            $data=array(
                'topic_name' => $topic_name,
                'questions' => $questions,
                'answers' => $answers,
                'topics' => $topics,
                'order' => $order,
                'questions_followed' => \Auth::user()->followQuestions
            );
        }else{ 
            $data=array(
            'topic_name' => $topic_name,
            'questions' => $questions,
            'answers' => $answers,
            'order' => $order,
            'topics' => $topics
        );

        }
       return view('pages.topic')->with($data);
    }


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($topic_name)
    {
        $topic = Topic::where('name', $topic_name)->get();
        $topics = Topic::All();
        $questions = Question::where('id_topic', $topic[0]->id)->orderBy('date','asc')->paginate(5);
        $answers = Answer::All();
       // dd($answers);
        // $topics = Topic::orderBy('name','desc')->paginate(4);
        //$questions = Question::orderBy('karma','desc'); 
        if( \Auth::user() != null){
            $data=array(
                'topic_name' => $topic_name,
                'questions' => $questions,
                'answers' => $answers,
                'topics' => $topics,
                'questions_followed' => \Auth::user()->followQuestions
            );
        }else{ 
            $data=array(
            'topic_name' => $topic_name,
            'questions' => $questions,
            'answers' => $answers,
            'topics' => $topics
        );

        }
       return view('pages.topic')->with($data);
    }

    public function follow(Request $request){
        $data = $request->all();
        $question_id = $request->input('id_question');

        $id_user = \Auth::user()->id;
        $followedQuestions=\Auth::user()->followQuestion;
        //if user dont follow create followTopic
        $deleted = FALSE;
        foreach ($followedQuestions as $follow){
            if($follow['id'] == $question_id){
                $answer_followed = FollowQuestion::where([
                    ['id_user', $id_user],
                    ['id_question',$question_id]
                ])->delete();
            $deleted = TRUE;
            break;
            }
        }
        if($deleted == FALSE){
        FollowQuestion::create([
            'id_user' => $id_user,
            'id_question' => $question_id
            ]);
        }
       
        $topicDepois = \Auth::user()->followQuestion;

        return response()->json([
            "status" => "success",
            "data" => $data,
            "user" => $id_user,
            "followAntes" => $followedQuestions,
            "followDepois" => $topicDepois,
            "deleted" => $deleted,
            "message" => "Followed topic"]);
    }

    public function upvote(Request $request){
        $data = $request->all();
        $id_question = $request->input('id_question');

        $id_user = \Auth::user()->id;

        $oldVote = DB::table('vote')
        ->where([['id_user', $id_user], ['id_question', $data['id_question']]])
        ->first();

        $oldVote_vote = DB::table('vote')
        ->where([['id_user', $id_user], ['id_question', $data['id_question']], ['vote', 'true']])
        ->first();

        if($oldVote != NULL){
            if($oldVote_vote == NULL){
                DB::table('vote')
                ->where([['id_user', $id_user], ['id_question', $data['id_question']]])
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
                'id_question' => $id_question,
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
        $id_question = $request->input('id_question');

        $id_user = \Auth::user()->id;

        
        $oldVote = DB::table('vote')
        ->where([['id_user', $id_user], ['id_question', $data['id_question']]])
        ->first();

        $oldVote_vote = DB::table('vote')
        ->where([['id_user', $id_user], ['id_question', $data['id_question']], ['vote', 'false']])
        ->first();

        if($oldVote != NULL){
            if($oldVote_vote == NULL){
                DB::table('vote')
                ->where([['id_user', $id_user], ['id_question', $data['id_question']]])
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
                'id_question' => $id_question,
                'vote' => 'FALSE'
                ]);
        }

        return response()->json([
            "status" => "success",
            "data" => $data,
            "user" => $id_user,
            "message" => "downvote"]);
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

    public function updateQuestion(Request $request){
        $data = $request->all();
        DB::table('question')
            ->where('id', $data['id_question'])
            ->update([
                    'short_message' => $data['short_message'],
                    'long_message' => $data['long_message'],
                    'id_topic' => $data['id_topic']
              ]);

        return response()->json([
            "status" => "success",
            "data" => $data,
            "message" => "update Question"]);
    }

  
    public function unfollow(Request $request){
        $data = $request->all();
        $id_user =   \Auth::user()->id;
        FollowQuestion::where([
            ['id_user', $id_user],
            ['id_question', $data['id_question']]
        ])->delete();
        return response()->json([
            "status" => "success",
            "data" => $data,
            "message" => "created question"]);
    }


    public function followQuestion(Request $request){
        $data = $request->all();
        $id_question = $request->input('id_question');

        $id_user = \Auth::user()->id;
        $followedQuestions=\Auth::user()->followQuestion;
        //if user dont follow create followTopic
        $deleted = FALSE;
        foreach ($followedQuestions as $follow){
            if($follow['id'] == $id_question){
                $question_followed = FollowQuestion::where([
                    ['id_user', $id_user],
                    ['id_question',$id_question]
                ])->delete();
            $deleted = TRUE;
            break;
            }
        }
        if($deleted == FALSE){
        FollowQuestion::create([
            'id_user' => $id_user,
            'id_question' => $id_question
            ]);
        }
       
        $topicDepois = \Auth::user()->followQuestion;

        return response()->json([
            "status" => "success",
            "data" => $data,
            "user" => $id_user,
            "followAntes" => $followedQuestions,
            "followDepois" => $topicDepois,
            "deleted" => $deleted,
            "message" => "Followed topic"]);
    }



    public function getPageWithSort(Request $request){
        $topic_name = $request->input('topic_name');
        $order = $request->input('sortBy');
        return redirect('/topic/'.$topic_name.'/order/'.$order);
    }

    public function getPageSort($topic_name, $order){
        $topic = Topic::where('name', $topic_name)->get();
        $topics = Topic::All();
        $questions = Question::where('id_topic', $topic[0]->id)->orderBy('date',$order)->paginate(5);
        $answers = Answer::All();
    // dd($answers);
        // $topics = Topic::orderBy('name','desc')->paginate(4);
        //$questions = Question::orderBy('karma','desc'); 
        if( \Auth::user() != null){
            $data=array(
                'topic_name' => $topic_name,
                'questions' => $questions,
                'answers' => $answers,
                'topics' => $topics,
                'order' => $order,
                'questions_followed' => \Auth::user()->followQuestions
            );
        }else{ 
            $data=array(
            'topic_name' => $topic_name,
            'questions' => $questions,
            'answers' => $answers,
            'order' => $order,
            'topics' => $topics
        );
        return view('pages.topic')->with($data);
    }
}
}
