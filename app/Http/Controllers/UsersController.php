<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Topic;
use Image;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
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
    public function update(Request $request)
    {
       // $data = $request->all();

        $name = $request['name'];
        $email = $request['email'];
        $bio = $request['bio'];
        $user_id = $request['id'];

        $user = User::find($user_id);
        $img = $request->file('pic');
        if($img != null){
            $filename = time() . '.' . $img->getClientOriginalExtension();
            Image::make($img)->save(public_path('/images/' . $filename));
            $user->img = $filename;
        }

 
        $user->name=$name;
        $user->email=$email;
        $user->bio = $bio;
        $user->save();

		
		$questions = $user->questions;
        return redirect()->route('profile',['id' => $user->username]); 
       
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


    public function disable(Request $request){
        $data = $request->all();
        $user = User::find($data['id']);
        if($user->disabled){
            DB::table('user')
            ->where('id',$data['id'])
            ->update([
                'disabled' => false
            ]);
        }else if(!$user->disabled){
            DB::table('user')
            ->where('id',$data['id'])
            ->update([
                'disabled' => true
            ]);
        }
    
        return response()->json([
            "status" => "success",
            "data" => $data,
            "message" => "User disabled updated"]);

    }

}
