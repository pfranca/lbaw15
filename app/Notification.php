<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Question;


class Notification extends Model{

// Table name
protected $table = 'notification';

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
    'notificated_user', 'id_question', 'message', 'seen', 'date'
];

public function question(){
    return $this->belongsTo('App\Question');
}


public function getQuestion($question_id){
    $question = Question::find($question_id);
    return $question;
}

public function getTopic($question_id){
    $question = Question::find($question_id);
    $topic = Topic::find($question->id_topic);
    return $topic;
}

}
?>