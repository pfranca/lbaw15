<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;


class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'id';

    protected $table = 'user';

    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'img', 'username', 'email', 'password', 'bio', 'disabled', 'type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function questions(){
        return $this->hasMany('App\Question','id_author');
    }

    public function answers(){
        return $this->hasMany('App\Answer','id_author');
    }

   public function followTopic(){
        return $this->belongsToMany('App\Topic','followtopic','id_user','id_topic')->withPivot('id_user', 'id_topic');
    }

    public function followTopicId($id_topic,$id_user){
        $topic = FollowTopic::where([
            ['id_user', $id_user],
            ['id_topic',$id_topic]
        ])->count();
        return $topic == 1;
    }

    public function followQuestion(){
        return $this->belongsToMany('App\Question','followquestion','id_user','id_question')->withPivot('id_user', 'id_question');
    }

    public function reports(){
        return $this->hasMany('App\Report','id_reporting_user');
    }

    public function notifications(){
        return $this->hasMany('App\Notification','notificated_user');
    }
    public function followQuestionId($id_question,$id_user){
        $question = FollowQuestion::where([
            ['id_user', $id_user],
            ['id_question',$id_question]
        ])->count();
        return $question == 1;
    }

    public function getId(){
        return $id;
    }

    public function isFollowedQuestion($id_question, $id_user){
        $question = FollowQuestion::where([
            ['id_user', $id_user],
            ['id_question',$id_question]
        ])->count();
        if($question == 1){
            return true;
        }else{
            return false;
        }
    }

    public function getNotificationsNumber($id_user){

        return count(\DB::table('notification')->where([['notificated_user', $id_user], ['seen', 'false']])->get());

    }

    public function alreadyVoted($id_question,$id_user){
        $vote = Vote::where([['id_user',$id_user],['id_question',$id_question]])->first();
        if($vote == null){
            return null;
        }

        if($vote->attributes['vote'] == false){
            return -1;
        }
        if($vote->attributes['vote'] == true){
            return 1;
        }
    }

    public function getTotalKarma($id_user){
        $user = User::find($id_user);
        $karma = 0;
        foreach($user->questions as $question){
            $karma += $question->karma;
        }
        return $karma;
    }

    public function getTotalAnswers($id_user){
        $user = User::find($id_user);
        return count($user->answers);
    }

    public function alreadyVotedAnswer($id_answer, $id_user){
        $vote = Vote::where([['id_user',$id_user],['id_answer',$id_answer]])->first();
        if($vote == null){
            return null;
        }

        if($vote->attributes['vote'] == false){
            return -1;
        }
        if($vote->attributes['vote'] == true){
            return 1;
        }
    }
}