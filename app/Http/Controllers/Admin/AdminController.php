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
        $topics = \DB::table('topic')->select('');
        return view('pages.adminTopic',compact('topics'));
    }

}
?>