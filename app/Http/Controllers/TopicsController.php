<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\FollowTopic;
use App\User;

class TopicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = \DB::table('topic')->where('disabled','false')->get();
        // $topics = Topic::orderBy('name','desc')->paginate(4);
        return view('pages.home')->with('topics',$topics);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show( $id)
    {
        //
    }   

    public function follow(Request $request){
        $data = $request->all(); // This will get all the request data.
        $topic = $request->input('id_topic');

       $user_id = \Auth::user()->id;

        FollowTopic::create([
            'id_user' => $user_id,
            'id_topic' => $topic
            ]);


        return response()->json([
            "status" => "success",
            "data" => $data,
            "user" => $user_id,
            "message" => "Followed topic"]);

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
}
