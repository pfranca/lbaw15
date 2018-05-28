<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    // Table name
    protected $table = 'topic';

    // Primary key
    public $primaryKey = 'id';

    //Timestamps 
   public $timestamps = false;

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'img',
    ];

    public function questions(){
        return $this->hasMany('App\Question','id');
    }

    public function followTopic(){
        return $this->belongsToMany('App\User','followtopic','id_user','id_topic')->withPivot('id_user', 'id_topic');;
    } 

    public function getBestQuestion($id_topic){
        $topic = Topic::find($id_topic);
        $questions = Question::all()->where('id_topic',$id_topic);


        $karma = 0;
        $bestQuestion=null;
        foreach($questions as $question){
            if($question->karma > $karma){
                $karma = $question->karma;
                $bestQuestion = $question;
            }
        }
        return $bestQuestion;
    }
}
