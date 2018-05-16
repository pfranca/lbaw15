<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Question extends Model
{
    // Table name
    protected $table = 'question';

    // Primary key
    public $primaryKey = 'id';

    protected $dateFormat = 'U';

     //Timestamps 
    public $timestamps = false;



     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_author', 'id_topic', 'short_message', 'long_message'
    ];

    public function user(){
        return $this->belongsTo('App\User','id_author');
    }

    public function topic(){
        return $this->belongsTo('App\Topic','id_topic');
    }

    public function answers(){
        return $this->hasMany('App\Answer','id_question');
    }
    
    public function followQuestion(){
        return $this->belongsToMany('App\User','followquestion','id_user','id_question')->withPivot('id_user', 'id_question');
    }

    public function reports(){
        return $this->hasMany('App\Report','id_reported_question');
    }

    public function notifications(){
        return $this->hasMany('App\Notification','id_question');
    }

    public function getBestAnswer($question_id){
        $question = Question::find($question_id);
        $answers = $question->answers;
        $karma = 0;
        $bestAnswer=null;
        foreach($answers as $answer){
            if($answer->karma > $karma){
                $karma = $answer->karma;
                $bestAnswer = $answer;
            }
        }
        return $bestAnswer;
     //   return  \DB::raw("SELECT date, karma, message, username FROM answer, \"user\" WHERE id_question = \"$question_id\" AND answer.disabled=FALSE AND id_author = \"user\".id AND karma = (SELECT max(karma) FROM answer WHERE id_question = \"$question_id\");");
    }

    public function getUser($question_id){
        $question = Question::find($question_id);
        return $question->user;
    }
}
