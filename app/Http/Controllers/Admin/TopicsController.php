<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Auth;
use App\User;

class TopicsController extends Controller
{
    

    use AuthenticatesUsers;


    public function findOrCreate($user, $provider){
        $authUser = User::where('id_google', $user->id_google)->first();
        if($authUser){
            return $authUser;
        }
        return User::create([
            'username'=>$user->name,
            'email'=>$user->email,
            'name'=>$user->name,
            'img'->$user->name,
        ]);
    }


    public function getInfo(){
        return "ok";
    }

}
?>