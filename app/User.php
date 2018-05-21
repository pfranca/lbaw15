<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;


class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'id';

    //protected $table = 'user';

    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'img', 'username', 'email', 'password',
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
}